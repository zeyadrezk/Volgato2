<?php

    namespace App\Http\Controllers\dashboard;

    use App\Http\Controllers\Controller;
    use App\Models\StaticPage;
    use Illuminate\Http\Request;

    class StaticPageController extends Controller
    {

        public function index()
        {
            $pages = StaticPage::get();
            return view('dashboard.staticPage.index',compact('pages'));
        }

        public function show($id)
        {
            $page = StaticPage::where('id', $id)->first();;
            return view('dashboard.staticPage.show',compact('page'));


        }

        public function edit($id)
        {
            $page = StaticPage::where('id', $id)->first();;
            return view('dashboard.staticPage.edit',compact('page'));
        }

        public function update(Request $request, $id)
        {

            $request->validate([
                'name_en' => 'required|string',
                'name_ar' => 'required|string',
                'description_en' => 'required|string',
                'description_ar' => 'required|string',
            ]);

            $page = StaticPage::findOrFail($id);
            $page->title = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];

            $page->description = [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ];

            $page->save();

            return redirect('admin/pages')->with('success','Page updated successfully.');
        }


    }
