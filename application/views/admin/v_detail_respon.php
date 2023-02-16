		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="container-fluid">
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
					<h3 class="page-header" style="border-bottom: solid 1px blue">Detail Responden</h3>
					<div class="row">
					</div>
					<div class="card">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Pertanyaan</th>
										<th>Jawaban</th>
									</tr>
								</thead>
								<?php
								// foreach ($no_wifi as $tyy) {
								// $no_wifi = $this->db->query("SELECT hasil_survey,alamat,pic,foto_stiker,lat,lng FROM data_wifi")->row();
								?>
								<tbody>
									<?php
									$no = 1;
									foreach ($id as $item) { ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td style="font-size:1em; text-align:center;"><?php echo $item['parameter'] ?></td>
											<td><?php echo $item['value'] ?></td>

										</tr>
									<?php }
									?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<!-- /.container-fluid -->

				</section>
				<!-- /.content -->

			</div>
		</div>
		</div>