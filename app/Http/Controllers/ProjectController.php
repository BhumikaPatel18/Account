<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

use App\Http\Requests\ProjectValidation;
use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;


class ProjectController extends Controller
{
    protected $projectRepo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ProjectRepositoryInterface $project)
    {
        $this->middleware('auth');
        $this->projectRepo = $project;
    }

    public function index()
    {
        return view('projects.index',['projects'=>$this->projectRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create')->with('success','data inserted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectValidation $request)
    {
        $input = $request->validated();
        //($input);
        $this->projectRepo->create($input);
        return redirect()->route('projects.index')->with('stored-msg', ' Data is successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('projects.show',['tshow'=>$this->projectRepo->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('projects.edit',['project'=>$this->projectRepo->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => '',
            'email' => '',
            'title' => '',
            'description' => '',
            'start_date' => '',
            'due_date' => '',

        ]);
        $this->projectRepo->update($request,$id);
        return redirect()->route('projects.index')->with('update-msg', ' Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        project::findOrFail($project->id)->delete();
        return redirect()->route('projects.index')->with('delete-msg', ' Data is successfully deleted');
    }
}
