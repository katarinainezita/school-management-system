<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Section;
use App\Models\Article;
use App\Models\Video;
use App\Models\Test;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    //
    public function new(Request $request, $slug, $module_id): RedirectResponse
    {
        // request validation
        $request->validate([
            'title' => 'required|string',
            'type' => ['required', Rule::in(['Article', 'Video', 'Test'])]
        ]);

        // get module object and make new section object
        $module = Module::find($module_id);
        $section = new Section;
        $section->title = $request->title;
        $section->order = $module->numOfSections()+1;
        $module->sections()->save($section);

        // make content object based on type
        // Article typed content
        if($request->type == 'Article')
        {
            $content = new Article;
            $content->save();
            $content->section()->save($section);
        }

        // Video typed content
        else if($request->type == 'Video')
        {
            $content = new Video;
            $content->save();
            $content->section()->save($section);
        }

        // Quiz typed content
        else if($request->type == 'Test')
        {
            $content = new Test;
            $content->save();
            $content->section()->save($section);
        }

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Section has been added']);
    }

    public function delete($slug, $module_id, $section_order)
    {
        $module = Module::find($module_id);
        
        // deleted section
        $module->sections()->where('order', $section_order)->delete();

        // upadted order section
        $updatedSection = $module->sections()->where('order', '>', $section_order)->get();

        // update section order
        foreach($updatedSection as $section)
        {
            $section->order = $section->order-1;
            $section->save();
        }

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Section has been deleted']);
    }
}
