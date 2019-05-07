<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3"><?php echo $data['title']; ?></h1>
            <p class="lead"><?php echo $data['description']; ?></p>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['posts'] as $post) : ?>
            <div class="col-md-4">
                <div class="card card-body mb-3">
                    <h4 class="card-title">
                        <?php echo $post->title; ?>
                    </h4>
                    <div class="bg-light p-2 mb-3">
                        writtem by <?php echo $post->name; ?> on <?php echo $post->postCreated?>
                    </div>
                    <p class="card-text"><?php echo $post->body?></p>
                    <a href=" <?php echo URLROOT;?>/posts/show/<?php echo $post->postId;?>" class="btn btn-dark">More</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>