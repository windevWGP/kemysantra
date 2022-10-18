<?php
$data_video = mysqli_query($conn, "SELECT * FROM video ORDER BY id DESC");
?>

<div class="container mt-3">
	<div class="row">
		<div class="col-lg-12">
			<div class="text-left">
				<h5 class="fables-main-text-color font-25 my-3">Video</h5>
				<hr>
			</div>
		</div>
	</div>

	<div class="gallery-filter">
		<div class="portfolioContainer row">

			<?php foreach ($data_video as $row) : ?>

				<?php $link_youtube = $row["link_youtube"]; ?>

				<?php $id_video = $row["link_youtube"]; ?>
				<div class="col-lg-4 mb-0 mb-lg-3">
					<div class="card wow fadeIn mb-3 mt-4" data-wow-delay=".1s" style="border-radius: 20px;">
						<div class="position-relative" style="border-top-right-radius: 20px;">
							<img src=" https://img.youtube.com/vi/<?= $id_video; ?>/hqdefault.jpg" alt="" class="w-100" style="border-top-right-radius: 20px;">
							<div class="demo-gallery-poster fables-main-gradient" style="border-top-right-radius: 20px;">
								<a data-fancybox href="https://www.youtube.com/embed/<?= $id_video; ?>">
									<img src="img/play-button.png" alt="play button" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="col-lg-12" style="background: #202D3A; border-bottom-left-radius: 20px;">
							<div class="text-center pt-1 pb-1 crop-text-2 font-11 text-white" style="height: 50px;">
								<?php
								$title = get_youtube_title($id_video);
								echo $title;
								?>
							</div>
						</div>

					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

</div>