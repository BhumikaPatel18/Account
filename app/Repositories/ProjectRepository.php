<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all() //index
    {
        return Project::all();
    }

    public function create($input) //store
    {
        // $input = $request->validated();
        return Project::create($input);
        // return account::all();
    }

    public function find($id) //edit or  show
    {
        return Project::findorfail($id);
    }

    public function update($request,$id) //update
    {
        $input = $request->all();
        $project = Project::find($id);
        $project->fill($input)->save();
    }

    public function delete($id) //edit
    {
        return project::findorfail($id)->delete();
    }
}
