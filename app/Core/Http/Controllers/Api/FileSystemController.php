<?php

namespace App\Core\Http\Controllers\Api;

use App\Components\MediaSystem\MediaSystemApiBuilder;
use App\Components\MediaSystem\MediaSystemBuilder;
use App\Core\Contracts\MediaSystemContract;
use App\Core\Http\Controllers\Controller;
use App\Core\Repositories\FolderRepository;
use App\Core\Repositories\MediaRepository;
use App\Core\Support\Media\MediaReceiver;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Plank\Mediable\HandlesMediaUploadExceptions;

class FileSystemController extends Controller
{
    use HandlesMediaUploadExceptions;

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
     * FileSystemController constructor.
     * @param MediaSystemContract $mediaSystem
     * @param MediaSystemApiBuilder $mediaSystemBuilder
     */
    public function __construct(MediaSystemContract $mediaSystem, MediaSystemApiBuilder $mediaSystemBuilder)
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
     *
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
        $path = $path ? $path . '/' . $folderName : $folderName;

        return ['media' => $media,
            'directories' => $directories,
            'path' => $path,
            'folder' => $folder,
            'count' => $count,
            'disk' => $disk,];
    }

    /**
     * @param Request $request
     * @param null $folder
     * @param string $disk
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|RedirectResponse
     */
    public function index(Request $request, $disk = '', $folder = null)
    {
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
        $media['media']->getCollection()->map(function ($item) use ($disk, $folder, $urlFolderPathBuild) {
            $item['url'] = $item->getUrl();
            $item['download_url'] = route("api.media::download", [$disk, $item->id, $folder->id]);
            $item['delete_url'] = route("api.media::get.delete", [$disk, $item->id]);
            $pathArr = array_map(function ($item) {
                if ($item['folder_name'] == "../") {
                    return '..';
                } else {
                    return $item['folder_name'];
                }
            }, $urlFolderPathBuild);
            $item['full_path'] = implode("/", $pathArr);
        });

        $directories->map(function ($item) use ($disk, $folder) {
            // do something
        });

        return response()->json(compact('media', 'directories', 'path', 'folder', 'count', 'urlFolderPathBuild', 'disk', 'rootFolders'));
    }

    /**
     * get folder structure and response for json requests.
     *
     * @param Request $request
     * @param null $folder
     * @param string $disk
     *
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
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * get folders and files in html format and
     * response for json requests for
     * file linker functionality.
     *
     * @param Request $request
     * @param null $folder
     * @param string $disk
     *
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
            $urlFolderPathBuild = $this->mediaSystemBuilder->getParentFoldersPathLinks($folder, $diskName, 'admin::media::file_linker');
            $rootFolders = $this->mediaSystemBuilder->getDiskUrls($diskName, 'admin::media::file_linker');
            $multiple = $request->get('multiple') === 'true' ? true : false;

            return view('admin.fileLinker.file-linker',
                compact('media', 'directories', 'path', 'folder', 'count', 'urlFolderPathBuild', 'disk', 'rootFolders', 'multiple'));
        } catch (ModelNotFoundException $e) {
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * get folders and response
     * for json requests
     * to reload.
     *
     * @param Request $request
     * @param null $folder
     *
     * @return mixed
     */
    public function getIndexFolders(Request $request, $disk, $folder = null)
    {
        $folderDisk = $this->folder->disk($disk);
        $folder = $folderDisk->find($request->folder);
        $path = $this->folder->getParentFoldersPath($folder);
        $folderName = $folder->name ? $folder->name : '';
        $path = $path ? $path . '/' . $folderName : $folderName;
        $directoryTransformed = $this->mediaSystemBuilder->presentFolders($request, $folder, $path);

        return $directoryTransformed;
    }

    /**
     * File Upload Handler.
     *
     * @param Request $request
     * @param string $disk
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request, $disk = '')
    {
        try {
            $mediaReceiver = new MediaReceiver($request);
            $media = $mediaReceiver->receive('file', function ($file) use ($request, $disk) {
                return $this->mediaSystem->makeChunkedFile($request, $file, $disk);
            });

            return response()->json([
                'media' => json_encode($media),
            ]);
        } catch (ModelNotFoundException $e) {
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * make folder && store the
     * folder in table.
     *
     * @param Request $request
     * @param string $disk
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeFolder(Request $request, $disk = '')
    {
        try {
            $folder = $this->mediaSystem->disk($disk)->makeFolder($request, $disk);

            return response()->json([$disk, $folder->unique_id]);
        } catch (ModelNotFoundException $e) {
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * @param Request $request
     * @param string $disk
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function renameFolder(Request $request, $disk = '')
    {
        try {
            $folder = $this->mediaSystem->renameFolder($request, $disk);

            return response()->json(compact('disk', 'folder'));
        } catch (ModelNotFoundException $e) {
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * @param Request $request
     * @param string $disk
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function renameFile(Request $request, $disk = '')
    {

        $folder = $this->mediaSystem->disk($disk)->renameFile($request, $disk);
        return response()->json(['msg' => 'File name changed successfully!'], 200);

    }

    /**
     * download file link.
     *
     * @param $id
     * @param $folder
     * @param string $disk
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|RedirectResponse
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
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * Remove the specified media
     * from storage.
     *
     * @param Request $request
     * @param $id
     *
     * @return Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        try {
            $media = $this->mediaSystem->fileDelete($id);
            if ($request->ajax()) {
                return response()->json(['message' => 'File deleted', 'title' => 'Success'], 200);
            }
            $this->toastr('info', 'File Deleted', 'Success');

            //TODO remove redirect and use response()
            return redirect()->route('admin::media::index', [$media->disk, $media->directory_id]);
        } catch (ModelNotFoundException $e) {
            \Log::warning("ModelNotFoundException Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (FileNotFoundException $e) {
            \Log::error("Filesystem Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        } catch (\Throwable $e) {
            \Log::error("Error: msg - " . $e->getMessage() . " code - " . $e->getCode());
            return response()->json(['msg' => $e->getMessage(), $e->getCode()]);
        }
    }

    /**
     * TODO fix delete folders method
     * remove folder and the files
     * attached.
     *
     * @param Request $request
     * @param string $disk
     * @param $folder
     *
     * @return Response|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function folderDestroy(Request $request, $disk, $folder)
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