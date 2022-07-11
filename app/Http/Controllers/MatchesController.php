<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MatchesController extends Controller
{
    public function downloadCSV()
    {
        $table = Matches::get();
        $filename = "matches.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Team 1', 'Team 2', 'Ergebnis', 'Sieger', 'Erstellt am'));

        foreach($table as $row) {
            fputcsv($handle, [
                $row->teams[0]->player1 . $row->teams[0]->player2, 
                $row->teams[1]->player1 . $row->teams[1]->player2, 
                $row->Score, 
                $row->teams[0]->winner == true ? 'Team 1 hat gewonnen' : 'Team 2 hat gewonnen',
                $row->created_at
            ]);
        }
        fclose($handle);
        $headers = [
            'Content-Type' => 'text/csv',
        ];
        return Response::download($filename, 'matches.csv', $headers);
    }

    public function update(Request $request)
    {
        $match = Matches::find($request->id);

        $match->update([
            'Score' => $request->score,
        ]);

        $team1 = $match->teams[0];
        $team1->update([
            'player1' => $request->player1,
            'player2' => $request->player2,
            'winner' => $request->winner == 'Team1' ? true : false,
        ]);

        $team2 = $match->teams[1];
        $team2->update([
            'player1' => $request->player3,
            'player2' => $request->player4,
            'winner' => $request->winner == 'Team2' ? true : false,
        ]);
        return redirect()->route('matches');
    }

    public function delete($id)
    {
        $match = Matches::find($id);
        $team1_id = $match->teams[0]->id;
        $team1 = Team::find($team1_id)->delete();
        $team2_id = $match->teams[1]->id;
        $team2 = Team::find($team2_id)->delete();
        $match->delete();

        return redirect()->route('matches');
    }

    public function create(Request $request)
    {
        $player_arr = explode(',', $request->values);
        $player1 = Player::where('id', $player_arr[0])->first();
        $player2 = Player::where('id', $player_arr[1])->first();
        $player3 = Player::where('id', $player_arr[2])->first();
        $player4 = Player::where('id', $player_arr[3])->first();
        $match = Matches::create([
            'Score' => $request->score,
        ]);
        
        $team1 = Team::create([
            'player1' => $player1->vorname ." ". $player1->nachname,
            'player2' => $player2->vorname ." ". $player2->nachname,
            'winner' => $request->winner == 'Team1' ? true : false
        ]);
        $team2 = Team::create([
            'player1' =>  $player3->vorname ." ". $player3->nachname,
            'player2' => $player4->vorname ." ". $player4->nachname,
            'winner' => $request->winner == 'Team2' ? true : false
        ]);
        $teams = [$team1->id,$team2->id];
        
        $team1->player()->attach([$player1->id,$player2->id]);
        $team2->player()->attach([$player3->id,$player4->id]);
        $match->teams()->attach($teams);

        return redirect()->route('matches');
    }

    public function calculateWinAmount()
    {
        $winningTeams = Team::where('winner', true)->get();
        return $this->calculate($winningTeams);
    }

    public function calculateLoseAmount()
    {
        $losingTeams = Team::where('winner', false)->get();
        return $this->calculate($losingTeams);
    }

    public function calculate($team)
    {
        $player1 = $team->countBy('player1');
        $player2 = $team->countBy('player2');
        $ergebnis = [];
        foreach ($player1 as $key => $value) {
            if (isset($ergebnis[$key])) {
                $ergebnis[$key] += $value;
            }else{
                $ergebnis[$key] = $value;
            }
        }
        foreach ($player2 as $key => $value) {
            if (isset($ergebnis[$key])) {
                $ergebnis[$key] += $value;
            }else{
                $ergebnis[$key] = $value;
            }
        }
        return $ergebnis;
    }

    public function calculateTopPlayers($wins, $losses)
    {
        $ergebnis = [];
        foreach ($wins as $key => $win) {
            $ergebnis[$key] = ['wins' => $win, 'loss' => 0];
        }
        foreach ($losses as $key => $loss) {
            if (isset($ergebnis[$key])) {
                $ergebnis[$key]['loss'] += $loss;
            }
        }
        foreach ($ergebnis as $key => $item) {
            $ergebnis[$key] += ['win%' => number_format(($item['wins']/($item['wins']+$item['loss']))*100, 2)];
        }
        
        $ergebnis = collect($ergebnis)->sortBy('win%')->reverse()->toArray();
        
        $ergebnis = array_slice($ergebnis, 0, 3);
        
        return $ergebnis;
    }


    public function renderCreateMatch()
    {
        $player = Player::get();
        return view('createMatch', ['player' => $player]);
    }

    public function renderUpdateMatch($id)
    {
        $match = Matches::where('id', $id)->first();
        return view('updateMatch', ['match' => $match]);
    }

    public function render()
    {
        $wins = $this->calculateWinAmount();
        $losses = $this->calculateLoseAmount();
        $stats = $this->calculateTopPlayers($wins, $losses);
        
        $matches = Matches::orderByDesc('created_at')->paginate(20);
        $player = Player::get();
        return view('matches', compact('matches', 'stats'));
    }
}
