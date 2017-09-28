<?php

use Illuminate\Database\Seeder;

/**
 * Class FolderTableSeeder.
 */
class FolderTableSeeder extends Seeder
{
    /**
     * @var \App\Core\Drivers\FolderToDb\Synchronizer
     */
    protected $synchronizer;

    /**
     * FolderTableSeeder constructor.
     *
     * @param \App\Core\Drivers\FolderToDb\Synchronizer $synchronizer
     */
    public function __construct(\App\Core\Drivers\FolderToDb\Synchronizer $synchronizer)
    {
        $this->synchronizer = $synchronizer;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Core\Models\Folder::create([
            'name'      => '',
            'parent_id' => null,
            'locked'    => true,
        ]);

        $uploadsPath = public_path('uploads');
        $this->synchronizer->synchronizeWithFiles($uploadsPath, 'local');
    }
}
