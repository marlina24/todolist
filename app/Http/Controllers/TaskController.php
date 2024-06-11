<?php

// Marlina

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Add task
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {
        if (!$request->titre || !$request->description || !$request->date_fin) {
            return redirect()->back()->with('error', 'Veuillez remplir tous les champs!');
        }

        try {
            $task = new Task(
                [
                    'titre' => $request->titre,
                    'description' => $request->description,
                    'date_fin' => $request->date_fin,
                    'user_id' => Auth::id()
                ]
            );
            $task->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error, ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Tâche ajoutée avec succès!');
    }


    /**
     * Get user tasks
     * 
     * If user is not logged in, show to login page
     */
    public static function getUserTasks()
    {
        if (!Auth::check()) {
            return view('login');
        }

        $tasks = Task::where('user_id', Auth::id())->orderBy('date_fin', 'asc')->get();
        return view('home', ['tasks' => $tasks]);
    }


    /**
     * Edit task
     * 
     * @param int $id
     */
    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->back()->with('error', 'Tâche introuvable!');
        }

        if ($task->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier cette tâche!');
        }

        return view('edit-task', ['task' => $task]);
    }


    /**
     * Update task
     * 
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        if (!$request->titre || !$request->description || !$request->date_fin) {
            return redirect()->back()->with('error', 'Veuillez remplir tous les champs!');
        }

        try {
            $task = Task::find($id);

            if (!$task) {
                return redirect()->back()->with('error', 'Tâche introuvable!');
            }

            if ($task->user_id != Auth::id()) {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier cette tâche!');
            }

            $task->titre = $request->titre;
            $task->description = $request->description;
            $task->date_fin = $request->date_fin;
            $task->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error, ' . $e->getMessage());
        }

        return redirect('/')->with('success', 'Tâche modifiée avec succès!');
    }


    /**
     * Change task status
     * 
     * @param int $id
     * @param int $statut
     */
    public function statut($id, $statut)
    {

        try {
            $task = Task::find($id);

            if (!$task) {
                return redirect()->back()->with('error', 'Tâche introuvable!');
            }

            if ($task->user_id != Auth::id()) {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier cette tâche!');
            }

            $task->statut = !$statut;
            $task->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error, ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Statut modifié avec succès!');
    }


    /**
     * Delete task
     * 
     * @param int $id
     */
    public function destroy($id)
    {
        try {
            $task = Task::find($id);

            if (!$task) {
                return redirect()->back()->with('error', 'Tâche introuvable!');
            }

            if ($task->user_id != Auth::id()) {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à modifier cette tâche!');
            }

            Task::destroy($id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error, ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Tâche supprimée avec succès!');
    }
}
