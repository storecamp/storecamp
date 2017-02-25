<?php

namespace App\Http\Middleware;

use App\Core\Repositories\FolderRepository;
use Closure;
use Illuminate\Support\Facades\URL;

class FolderLocked
{
    private $folder;

    /**
     * FolderLocked constructor.
     * @param FolderRepository $folder
     */
    public function __construct(FolderRepository $folder)
    {
        $this->folder = $folder;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $disk = $request->disk ? $request->disk : 'local';
        $folderId = $request->folder;

        if($this->folder->disk($disk)->find($folderId)->locked){
            \Toastr::warning("Folder is used in other parts of the app", "Sorry it is locked and can't be edited or deleted!");
            return redirect()->to(\URL::previous());
        }
        return $next($request);
    }
}
