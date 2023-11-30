<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // add new module
    public function new(Request $request, $slug): RedirectResponse
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $module = new Module;

        $module->order = $course->numOfModules()+1;
        $module->title = $request->title;
        $course->modules()->save($module);

        for($i=1; $i<=$request->numOfSections; $i++)
        {
            $section = new Section;
            $section->title = "Section ".$i;
            $section->order = $i;
            $section->content_type = 'App\Models\Article';
            $module->sections()->save($section);
        }

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Module has been added']);
    }

    public function delete($slug, $module_order): RedirectResponse
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $allModule = $course->modules()->where('order', '>=', $module_order)->get();
        $deletedModule = $allModule->where('order', $module_order)->firstOrFail();
        $deletedModule->sections()->delete();
        
        $course->modules()->where('order', $module_order)->delete();

        // update module_order
        foreach($allModule as $module)
        {
            $module->order = $module->order-1;
            $module->save();
        }

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Module has been deleted']);
    }

    public function editModuleTitle(Request $request, $slug, $module_id): RedirectResponse
    {
        $module = Module::find($module_id);
        $module->title = $request->module_title;
        $module->save();

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Module title has been edited']);
    }
}
