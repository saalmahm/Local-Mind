<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
<<<<<<< HEAD
    | based disks are available to your application for file storage.
=======
    | based disks are available to your application. Just store away!
>>>>>>> b5b341913682f0aafe2fe49ecdf59e60dd94dbe2
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
<<<<<<< HEAD
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
=======
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
>>>>>>> b5b341913682f0aafe2fe49ecdf59e60dd94dbe2
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
<<<<<<< HEAD
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
            'report' => false,
=======
            'root' => storage_path('app'),
            'throw' => false,
>>>>>>> b5b341913682f0aafe2fe49ecdf59e60dd94dbe2
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
<<<<<<< HEAD
            'report' => false,
=======
>>>>>>> b5b341913682f0aafe2fe49ecdf59e60dd94dbe2
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
<<<<<<< HEAD
            'report' => false,
=======
>>>>>>> b5b341913682f0aafe2fe49ecdf59e60dd94dbe2
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
