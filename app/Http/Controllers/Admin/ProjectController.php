<?php
//modifiche dopo spostamento in cartella Admin
namespace App\Http\Controllers\Admin;
//importazione controller principale
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
//importo dal seeder per store
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //all metodo per leggere tutti i campi della tabella
        $projects = Project::all();
        //passo alla rotta con view() la mia pagina blade
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('admin.projects.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //salviamo i dati dentro una variabile
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = $data['slug'];
        $project->save();

        //se esistono tecnologie crea la relazione con tabella pivot
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

        //uso with per stampare un mess in pagina
        return view('admin.projects.show', compact('project'))->with('message', 'Progetto creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Technology $technology)
    {
        return view('admin.projects.show', compact('project', 'technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($data['title'])->slug();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = $data['slug'];
        $project->save();

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // metodi per eliminare manualmente indipendentemente dalle configurazione dei database
        //$project->technologies()->sync([]);
        $project->technologies()->detach();

        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
