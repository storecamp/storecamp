<?php

namespace App\Http\Middleware;

use App\Core\Repositories\FolderRepository;
use Closure;

class FolderLocked
{
    private $folder;

    /**
     * FolderLocked constructor.
     *
     * @param FolderRepository $folder
     */
    public function __construct(FolderRepository $folder)
    {
        $this->folder = $folder;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->id) {
            $folderId = $request->id;
        } else {
            $folderId = $request->folder;
        }

        $disk = $request->disk ? $request->disk : 'local';

        if ($this->folder->disk($disk)->findOrFail($folderId)->locked) {

            if ($request->ajax()) {
                return response()->json(['title' => 'Folder is used in other parts of the app',
                    'msg' => "Sorry it is locked and can't be edited or deleted!"], 403);
            }
            \Toastr::warning('Folder is used in other parts of the app',
                "Sorry it is locked and can't be edited or deleted!");

            return redirect()->to(\URL::previous());
        }

        return $next($request);
    }
}
