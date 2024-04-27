
<div class="container">
    <div class="sectionTitle">
        <h1 class="title" style="text-align:center;padding-bottom:50px;">Your activity</h1>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <!-- show the notif when success or failed doing the action -->
            <?php Flasher::showFlash(); ?>
        </div>
    </div>
    <div class="add">
        <div class="pb-4 d-flex justify-content-between">
          <p>Hi <?=$data['nama']?>, These is your activity</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn border border-dark ModalTambah" data-bs-toggle="modal" data-bs-target="#formModal">
            Add Activities <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M8 12h8m-4-4v8"/></g></svg>
            </button>
            
        </div>
    </div>
    <div class="container ">
            <?php foreach($data['activity'] as $activity) :?>
                <div class="card h-auto mb-3">
                    <div class="card-body ps-5">
                        <h5 class="card-title"><?= $activity['activity']?></h5>
                        <p class="card-text"><?php
                        
                        if($activity['status'] == 1){
                            echo "Not Finished Yet";
                        }else{
                            echo "Finished";
                        }
                        
                        ?></p>
                        <p class="card-text"><?= $activity['deadline']?></p>
                        <?php
                        
                        if($activity['status'] == 1){
                            echo '<div class="pb-4 ">
                                    <div class="d-flex justify-content-between">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <a href="'. BASEURL .'/activity/getDataEditable/'. $activity['idUser'] .'" class="btn border border-dark ModalUbah" data-id='.$activity['idActivity'].' data-bs-toggle="modal" data-bs-target="#formModal">Edit</a>
                                        
                                        <a href="'. BASEURL .'/activity/markFinished/'. $activity['idUser'] .'/'. $activity['idActivity'] .'" class="btn border border-dark ModalUbah" >Mark Finish</a>
                                        
                                    </div>
                                    <a href="'. BASEURL .'/activity/deleteActivities/'. $activity['idActivity'] .'/'. $activity['idUser'] .'" class="btn border border-dark" >Delete</a>
                                    
                                    </div>';
                        }else{
                            echo '<a href="" style="pointer-events:none;" class="btn btn-secondary">Finished</a>';
                        }
                        ?>
                        
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Add new Activities</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?= BASEURL;?>/activity/addNewActivity" method="post">
            
            <input type="hidden" id="idUser" name="idUser" value="<?= $data['idUser'];?>">
            <input type="hidden" id="idActivity" name="idActivity" value="<?= $data['activity'];?>">
                
            <div class="form-group d-flex flex-column gap-2">
                <label for="activity">Activity</label>
                <input id="activity" name="activity" type="text">
                
                <label for="deadline">What date is your deadline?</label>
                <input type="date" class="form-control" id="deadline" name="deadline">
            
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn border border-dark">Add new Activities</button>
        </div>
      </form>
    </div>
  </div>
</div>
