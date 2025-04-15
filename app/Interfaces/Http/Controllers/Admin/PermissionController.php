<?php

namespace App\Interfaces\Http\Controllers\Admin;

use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Domain\Entities\PermissionEntity;
use App\Core\Application\Services\PermissionService;
use App\Core\Application\Services\ActivityLogService;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected PermissionService $permission_service;
    protected ActivityLogService $activity_log_service;
    
    public function __construct(
        PermissionService $permission_service, 
        ActivityLogService $activity_log_service
    )
    {
        $this->permission_service = $permission_service;
        $this->activity_log_service = $activity_log_service;
        $this->module='security-2fa';
        $this->page_breadcrumbs[] = [
            'page' => route('admin.permission.index'),
            'title' => __("Phân quyền truy cập")
        ];
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $this->activity_log_service->add('Truy cập trang thông tin profile');

        $data = $this->permission_service->list($request);

        $datatable=$this->getHTMLCategory($data);

		return view('admin.permission.index')
        ->with('page_breadcrumbs',$this->page_breadcrumbs)
        ->with('datatable',$datatable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dataCategory= $this->permission_service->list($request);
        $this->activity_log_service->add('Vào form create permission');
        $id = null;
        if (count($request->all())){
            $all = $request->all();
            $id = $all['id'];
        }

        return view('admin.permission.create_edit', compact('dataCategory','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function getHTMLCategory($menu)
	{
		return $this->buildMenu($menu);
	}
	function buildMenu($menu, $parent_id = 0)
	{
		$result = null;
		foreach ($menu as $key => $item)
			if ($item->parent_id == $parent_id) {
				$result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
              <div class='dd-handle nested-list-handle'>
                <span class='la la-arrows-alt'></span>
              </div>
              <div class='nested-list-content'>";
				$url = $item->url ?? "#";
				if($parent_id!=0){
                    $result.="<div class=\"m-checkbox\">
                                    <label class=\"checkbox checkbox-outline\">
                                    <input  type=\"checkbox\" rel=\"{$item->id}\" class=\"children_of_{$item->parent_id}\"  >
                                      <span></span><a href=\"$url\" style='color:#333' target='_blank'>".HTML::entities($item->title).' - ['.HTML::entities($item->name)."]</a>
                                    </label>
                                </div>";


				}
				else{

                    $result.="<div class=\"m-checkbox\">
                                    <label class=\"checkbox checkbox-outline\">
                                    <input  type=\"checkbox\" rel=\"{$item->id}\" class=\"children_of_{$item->parent_id}\"  >
                                    <span></span> <a href=\"$url\" style='color:#333' target='_blank'>".HTML::entities($item->title).' - ['.HTML::entities($item->name)."]</a>
                                    </label>
                                </div>";
				}
				$result .= "<div class='btnControll'>";

				$result .= "
				<a href='#' class='btn btn-sm btn-success edit_toggle' data-url='" . route("admin.permission.create",['id'=>$item->id]) . "' rel='{$item->id}' >Thêm mới</a>
				<a href='#' class='btn btn-sm btn-primary edit_toggle' data-url='" . route("admin.permission.edit",$item->id) . "' rel='{$item->id}' >Sửa</a>
                    <a href=\"#\" class=\"btn btn-sm btn-danger  delete_toggle \" rel=\"{$item->id}\">
                                        Xóa
                    </a>
                </div>
              </div>" . $this->buildMenu($menu, $item->id) . "</li>";
			}
		return $result ? "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
	}
}
