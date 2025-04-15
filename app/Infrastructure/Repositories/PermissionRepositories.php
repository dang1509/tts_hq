<?php

namespace App\Infrastructure\Repositories;
use App\Core\Domain\Repositories\PermissionRepositoryInterface;
use App\Core\Domain\Entities\PermissionEntity;
use App\Core\Domain\Exceptions\BaseException;
use App\Core\Domain\DTO\BaseResponse;
use Illuminate\Http\Request;
use App\Library\Helpers;
use Carbon\Carbon;
use DB;
use Log;
use Spatie\Permission\Models\Permission;

class PermissionRepositories implements PermissionRepositoryInterface
{
    /**
     * List all permissions
     *
     * @param array $request
     * @return array
     */

/**
 * Retrieves a list of permissions based on the provided request parameters.
 *
 * @param array $request An associative array containing request parameters such as 'sort', 'direction', and optionally 'perPage'.
 * @return array An array of PermissionEntity objects representing the permissions.
 */

    public function list(Request $request)
    {
        $paginate = config('app.pagination_item');

        if($request->filled('paginate')){
            $paginate = $request->get('paginate');
        }

        $data = Permission::query();
    
        if($request->filled('sort')){
            $data = $data->orderBy('id',$request->get('sort'));
        }
    
        $data = $data->get();
        // $data = $data->paginate($paginate);
    
        return $data;
        
    }
}