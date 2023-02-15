<?php

/** @var yii\web\View $this */
/** @var yii\db\ActiveRecord[] $users  */

$this->title = 'ユーザー一覧';

?>

<div class="user-list card" style="width: 600px; margin: 0 auto;">
    <div class="card-body">
        <h5 class="card-title"><?= $this->title ?></h5>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ユーザー名</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user) : ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $user->name ?></td>
                        <td>
                            <button class="btn btn-primary">編集</button>
                            <button class="btn btn-danger">削除</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
