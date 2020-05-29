<?php
if (getenv('S3_BUCKETNAME') && getenv('S3_ACCESS_KEY') && getenv('S3_SECRET_KEY')) {
    $CONFIG = array (
        'objectstore' => array (
            'class' => '\\OC\\Files\\ObjectStore\\S3',
            'arguments' => array (
                'bucket' => getenv('S3_BUCKETNAME'),
                'autocreate' => getenv('S3_AUTOCREATE') ? true : false,
                'key' => getenv('S3_ACCESS_KEY'),
                'secret' => getenv('S3_SECRET_KEY'),
                'use_ssl' => getenv('S3_USE_SSL') ? true : false,
                'use_path_style' => getenv('S3_USE_PATH_STYLE') ? true : false,
            )
        )
    );

    // Set Options
    if (getenv('S3_HOST')) {
        $CONFIG['objectstore']['arguments']['hostname'] = getenv('S3_HOST');
    }

    if (getenv('S3_PORT')) {
        $CONFIG['objectstore']['arguments']['port'] = (int) getenv('S3_PORT');
    }

    if (getenv('S3_REGION')) {
        $CONFIG['objectstore']['arguments']['region'] = getenv('S3_REGION');
    }
}
