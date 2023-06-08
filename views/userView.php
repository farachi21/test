<?php

$titel = "page afficher";

ob_start();
?>
<table class="container table table-bordered">
    <thead>
        <tr>
            <th class="align-top">Id</th>
            <th>Photo</th>
            <th class="max-width">Name</th>
            <th class="sortable">Date</th>
            <th> </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listUsers as $value) { ?>
        <tr>
            <td class="align-middle"><?= $value['id']?></td>
            <td class="align-middle text-center">
                <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><i class="fa fa-fw fa-photo" style="opacity: 0.8;"></i></div>
            </td>
            <td class="text-nowrap align-middle"><?= $value['name']?></td>
            <td class="text-nowrap align-middle"><span><?= substr( $value['trn_date'], 0, 10 ) ?></span></td>
            <td class="text-center align-middle"><i class="fa fa-fw text-secondary cursor-pointer <?php if(empty($value['complet'])) echo 'fa-toggle-off'; else echo 'fa-toggle-on';  ?>"></i></td>
            <td class="text-center align-middle">
                <div  class="btn-group align-top">
                    <a class="btn btn-sm btn-outline-success jouk" href="?edit=<?= $value['id']?>" >Edit</a>
                    <button class=" d-none" id="ok" data-toggle="modal"  data-target="#user-form-modal"></button>
                    <a class="btn btn-sm btn-outline-danger" href="?delet=<?= $value['id']?>" ><i class="fa fa-trash"></i></a>
                </div>
                
            </td>
        </tr>
        <?php  } ?>    
    </tbody>
</table>
<?php
$content = ob_get_clean();

require_once "../views/layout/header.php";
?>

