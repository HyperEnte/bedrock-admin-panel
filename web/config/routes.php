<?php

use Framework\Http\Application;
use App\Http\Action;

/** @var Application $app */

### Admin

$app->get('admin.home', '/admin', Action\Admin\HomeAction::class);

## Whitelist

$app->get('admin.whitelist.index', '/admin/whitelist', Action\Admin\Whitelist\IndexAction::class);
$app->get('admin.whitelist.add.form', '/admin/whitelist/add-player/form', Action\Admin\Whitelist\Add\FormAction::class);
$app->post('admin.whitelist.add.request', '/admin/whitelist/add-player/request', Action\Admin\Whitelist\Add\RequestAction::class);
$app->post('admin.whitelist.remove', '/admin/whitelist/remove-player/{uuid}/{name}', Action\Admin\Whitelist\RemoveAction::class);
$app->get('admin.whitelist.edit.form', '/admin/whitelist/edit-player/form/{uuid}', Action\Admin\Whitelist\Edit\FormAction::class);
$app->post('admin.whitelist.edit.request', '/admin/whitelist/edit-player/request/{uuid}', Action\Admin\Whitelist\Edit\RequestAction::class);

## Properties
$app->get('admin.properties.index', '/admin/properties', Action\Admin\Properties\IndexAction::class);
$app->get('admin.properties.edit.form', '/admin/properties/edit/form', Action\Admin\Properties\Edit\FormAction::class);
$app->post('admin.properties.edit.request', '/admin/properties/edit/request', Action\Admin\Properties\Edit\RequestAction::class);

## Info
$app->get('admin.info.index', '/admin/server-info', Action\Admin\Info\HomeAction::class);
$app->post('admin.info.start', '/admin/server/start', Action\Admin\Info\StartAction::class);
$app->post('admin.info.stop', '/admin/info/stop', Action\Admin\Info\StopAction::class);
$app->post('admin.info.restart', '/admin/info/restart', Action\Admin\Info\RestartAction::class);

## World
$app->get('admin.world.index', '/admin/world', Action\Admin\World\IndexAction::class);
$app->post('admin.world.upload', '/admin/world/upload', Action\Admin\World\UploadAction::class);
$app->post('admin.world.regenerate', '/admin/world/regenerate', Action\Admin\World\RegenerateAction::class);

## Backups
$app->get('admin.backup.index', '/admin/backup', Action\Admin\Backup\IndexAction::class);
$app->post('admin.backup', '/admin/backup', Action\Admin\Backup\BackupAction::class);
$app->post('admin.backup.download', '/admin/backup/download', Action\Admin\Backup\DownloadAction::class);
$app->post('admin.backup.remove', '/admin/backup/remove', Action\Admin\Backup\RemoveAction::class);

## Logs
$app->get('admin.logs.index', '/admin/logs', Action\Admin\Logs\IndexAction::class);
