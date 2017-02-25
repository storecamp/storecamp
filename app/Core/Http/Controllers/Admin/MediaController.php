<?php

namespace App\Core\Http\Controllers\Admin;

use App\Components\MediaSystem\MediaSystemBuilder;
use App\Core\Components\Flash\Flash;
use App\Core\Contracts\MediaSystemContract;
use App\Core\Repositories\FolderRepository;
use App\Core\Repositories\MediaRepository;
use Arcanedev\LogViewer\Exceptions\FilesystemException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\HandlesMediaUploadExceptions;

/**
 * Class MediaController
 * @package App\Core\Http\Controllers
 */
class MediaController extends BaseController
{
    use HandlesMediaUploadExceptions;
    /**
     * @var string
     */
    public $viewPathBase = "admin.media.";
    /**
     * @var string
     */
    public $errorRedirectPath = "admin/media";
    /**
     * @var MediaRepository
     */
    public $repository;
    /**
     * @var FolderRepository
     */
    public $folder;

    /**
     * @var
     */
    public $defaultFolder;

    /**
     * @var MediaSystemBuilder
     */
    public $mediaSystemBuilder;
    /**
     * @var
     */
    public $mediaSystem;

    /**
     * MediaController constructor.
     * @param MediaSystemContract $mediaSystem
     * @param MediaSystemBuilder $mediaSystemBuilder
     */
    public function __construct(MediaSystemContract $mediaSystem, MediaSystemBuilder $mediaSystemBuilder)
    {
        $this->mediaSystemBuilder = $mediaSystemBuilder;
        $this->mediaSystem = $mediaSystem;

        $this->repository = $this->mediaSystem->media;
        $this->folder = $this->mediaSystem->folder;
        $this->defaultFolder = $this->folder->disk('local')->first();
    }

    /**
     * @param $request
     * @param string $disk
     * @param null $folder
     * @param bool $skipPaginate
     * @param array $dataTypes
     * @return array
     */
    private function preDefineIndexPart($request, $disk = '', $folder = null, $skipPaginate = false, array $dataTypes = [])
    {
        $disk = $disk ? $disk : 'local';
        $folderDisk = $this->folder->disk($disk);

        $folder = $folderDisk->getDefaultFolder($disk, $folder);
        $tag = $request->get('tag');
        $files = $this->mediaSystem->present($request, $folder, $tag, $disk, $skipPaginate, $dataTypes);
        $media = $files['media'];
        $directories = $files['directories'];
        $count = $files['count'];
        $path = $folderDisk->getParentFoldersPath($folder);
        $folderName = $folder->name ? $folder->name : '';
        $path = $path ? $path . "/" . $folderName : $folderName;

        return ['media' => $media,
            'directories' => $directories,
            'path' => $path,
            'folder' => $folder,
            'count' => $count,
            'disk' => $disk];

    }

    /**
     * @param Request $request
     * @param null $folder
     * @param string $disk
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, $disk = '', $folder = null)
    {
        try {
            $diskName = $disk;
            $predefined = $this->preDefineIndexPart($request, $disk, $folder);
            $media = $predefined['media'];
            $directories = $predefined['directories'];
            $path = $predefined['path'];
            $folder = $predefined['folder'];
            $count = $predefined['count'];
            $disk = $predefined['disk'];
            $urlFolderPathBuild = $this->mediaSystemBuilder->getParentFoldersPathLinks($folder, $diskName);
            $rootFolders = $this->mediaSystemBuilder->getDiskUrls($diskName);
            return $this->view('index', compact('media', 'directories', 'path', 'folder', 'count', 'urlFolderPathBuild', 'disk', 'rootFolders'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (FileNotFoundException $exception) {
            return redirect()->to($this->errorRedirectPath)->withErrors($exception);
        } catch (\Throwable $exception) {
            \Flash::error($exception->getCode(), $exception->getMessage());
            return redirect()->to($this->errorRedirectPath)->withErrors($exception);
        }
    }


    /**
     * get folder structure and response for json requests
     *
     * @param Request $request
     * @param null $folder
     * @param string $disk
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function getIndex(Request $request, $disk = '', $folder = null)
    {
        try {
            $predefined = $this->preDefineIndexPart($request, $disk, $folder);
            $media = $predefined['media'];
            $directories = $predefined['directories'];
            $path = $predefined['path'];
            $folder = $predefined['folder'];
            $count = $predefined['count'];
            $disk = $predefined['disk'];

            return $this->view('index-body_part', compact('media', 'directories', 'path', 'folder', 'count', 'disk'));
        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * get folders and files in html format and
     * response for json requests for
     * file linker functionality
     *
     * @param Request $request
     * @param null $folder
     * @param string $disk
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function filesLinker(Request $request, $disk = '', $folder = null)
    {
        try {
            $diskName = $disk;
            $dataTypes = explode(',', $request->get('dataTypes'));
            $predefined = $this->preDefineIndexPart($request, $disk, $folder, true, $dataTypes);
            $media = $predefined['media']['media'];
            $directories = $predefined['directories'];
            $path = $predefined['path'];
            $folder = $predefined['folder'];
            $count = $predefined['count'];
            $disk = $predefined['disk'];
            $urlFolderPathBuild = $this->mediaSystemBuilder->getParentFoldersPathLinks($folder, $diskName, "admin::media::file_linker");
            $rootFolders = $this->mediaSystemBuilder->getDiskUrls($diskName, "admin::media::file_linker");
            $multiple = $request->get('multiple') === "true" ? true : false;
            return view('admin.fileLinker.file-linker',
                compact('media', 'directories', 'path', 'folder', 'count', 'urlFolderPathBuild', 'disk', 'rootFolders', 'multiple'));
        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * get folders and response
     * for json requests
     * to reload
     *
     * @param Request $request
     * @param null $folder
     * @return mixed
     */
    public function getIndexFolders(Request $request, $disk, $folder = null)
    {
        $folderDisk = $this->folder->disk($disk);
        $folder = $folderDisk->find($request->folder);
        $path = $this->folder->getParentFoldersPath($folder);
        $folderName = $folder->name ? $folder->name : '';
        $path = $path ? $path . "/" . $folderName : $folderName;
        $directoryTransformed = $this->mediaSystemBuilder->presentFolders($request, $folder, $path);
        return $directoryTransformed;

    }

    /**
     * upload files
     *
     * @param Request $request
     * @param string $disk
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, $disk = '')
    {
        try {
            $media = $this->mediaSystem->makeFile($request, $disk);
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        } catch (FilesystemException $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * make folder && store the
     * folder in table
     *
     * @param Request $request
     * @param string $disk
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeFolder(Request $request, $disk = '')
    {
        try {
            $folder = $this->mediaSystem->disk($disk)->makeFolder($request, $disk);
            return redirect()->route('admin::media::index', [$disk, $folder->unique_id]);

        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        } catch (FilesystemException $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }


    /**
     * @param Request $request
     * @param string $disk
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function renameFolder(Request $request, $disk = '')
    {
        try {
            $folder = $this->mediaSystem->renameFolder($request, $disk);
            return redirect()->route('admin::media::index', [$disk, $folder->unique_id]);
        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        } catch (FilesystemException $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param Request $request
     * @param string $disk
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function renameFile(Request $request, $disk = '')
    {
        try {
            $folder = $this->mediaSystem->disk($disk)->renameFile($request, $disk);
            return redirect()->route('admin::media::index', [$folder->disk, $folder->unique_id]);
        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        } catch (FilesystemException $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * download file link
     *
     * @param $id
     * @param $folder
     * @param string $disk
     * @return Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($disk, $id, $folder)
    {
        try {
            $folderDisk = $this->folder->disk($disk);

            $file = $this->repository->find($id);
            $folder = $folder ? $folderDisk->find($folder) : $this->defaultFolder;
            $parentFoldersPath = $folderDisk->getParentFoldersPath($folder);
            $folderPath = $parentFoldersPath ? $parentFoldersPath . '/' . $folder->name : $folder->name;
            $folderFullPath = $folderDisk->getDiskRoot() . '/' . $folderPath;
            return response()->download($folderFullPath . '/' . $file->filename . '.' . $file->extension);

        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (FileNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * Remove the specified media
     * from storage.
     *
     * @param Request $request
     * @param $id
     * @return Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        try {
            $media = $this->mediaSystem->fileDelete($id);
            if ($request->ajax()) {
                return response()->json(['message' => 'File deleted', 'title' => 'Success'], 200);
            }
            return redirect()->route('admin::media::index', [$media->disk, $media->directory_id]);
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (FileNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * remove folder and the files
     * attached
     *
     * @param Request $request
     * @param string $disk
     * @param $folder
     * @return Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function folderDestroy(Request $request, $disk = '', $folder)
    {
        try {
            if (intval($folder) == 1) {
                return redirect()->back();
            }
            $this->mediaSystem->folderDelete($request, $folder, $disk);
            if ($request->ajax()) {
                return response()->json(['message' => 'Folder deleted', 'title' => 'Success'], 200);
            }
            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (FileNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }
}
