<?php $__env->startSection('title','اضافة '.$postInfo['title']); ?>
<?php $__env->startSection('page_level_plugins_styles'); ?>
<link href="<?php echo e(url('/')); ?>/admin/assets/yusuf/style_ney.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="<?php echo e(csrf_field()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_global_styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_level_styles'); ?>
<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/')); ?>/admin/assets/yusuf/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/')); ?>/admin/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('theme_layout_styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/droidarabickufi.css">
<link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/jNotify.jquery.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body_class','page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid'); ?>
<?php $__env->startSection('page_bar'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption font-red-sunglo">
			<i class="icon-settings font-red-sunglo"></i>
			<span class="caption-subject bold uppercase"><?php echo e(trans('mainpage.add_post')); ?></span>
		</div>
	</div>
	<div class="portlet-body form">
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_90" data-toggle="tab"> <?php echo e(trans('mainpage.general_data')); ?> </a>
						</li>
						<?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<li>
							<a href="<?php echo e('#tab_'.$row->id); ?>" data-toggle="tab"> <?php echo e(trans('mainpage.data')); ?> <?php echo e($row->name); ?> </a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						<?php if($postInfo['showgallerytab']): ?>
						<li>
							<a href="#tab_91" data-toggle="tab"> <?php echo e(trans('mainpage.image')); ?> </a>
						</li>
						<?php endif; ?>
						<?php if($postInfo['showembdtab']): ?>
						<li>
							<a href="#tab_92" data-toggle="tab"> <?php echo e(trans('mainpage.embd')); ?> </a>
						</li>
						<?php endif; ?>
						<?php if($postInfo['showlinktab']): ?>
						<li>
							<a href="#tab_93" data-toggle="tab"> <?php echo e(trans('mainpage.out_link')); ?></a>
						</li>
						<?php endif; ?>
						<?php if($postInfo['showoptiontab']): ?>
						<li>
							<a href="#tab_95" data-toggle="tab"> <?php echo e(trans('mainpage.general_option')); ?> </a>
						</li>
						<?php endif; ?>
					</ul>
					
					<div class="tab-content">
						<form method="POST" action="<?php echo e(url('/adminpanel/'.$postInfo['service'].'/create/'.$id)); ?>" enctype="multipart/form-data">
							<?php echo e(csrf_field()); ?>

							<div class="tab-pane active" id="tab_90">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="name"><?php echo e(trans('mainpage.name')); ?></label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="name" name="name" value="<?php echo e(isset($data->name) ? $data->name : ''); ?>">
												</div>
												<?php if($errors->has('name')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('name')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="status"><?php echo e(trans('mainpage.status')); ?></label>
												<div class="col-md-10">
													<select class="select2_category form-control" tabindex="1" name="status">
														<option value=""><?php echo e(trans('mainpage.status_post')); ?></option>
														<option value="0" <?php if(isset($data->status) && $data->status == '0' ){ echo 'selected'; } ?>><?php echo e(trans('mainpage.public')); ?></option>
														<option value="1" <?php if(isset($data->status) && $data->status == '1' ){ echo 'selected'; } ?>><?php echo e(trans('mainpage.not_public')); ?></option>
													</select>
												</div>
												<?php if($errors->has('name')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('name')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-md-line-input selectitep">
												<label class="col-md-2 control-label" for="parentid"><?php echo e(trans('mainpage.menu')); ?></label>
												<div class="col-md-10">
													<select class="select2_category newoption form-control" id="parentid" tabindex="1" name="depid">
														<option value=""><?php echo e(trans('mainpage.menu_sho')); ?></option>
														<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
														<option value="<?php echo e($row->id); ?>" <?php if(isset($data->depid) && $data->depid == $row->id ){ echo 'selected'; } ?>><?php echo e($row->shortname); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
													</select>
												</div>
												<?php if($errors->has('depid')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('depid')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
											<div class="form-group form-md-line-input submensuw selectiteps">
											</div>
										</div>
										<?php if($postInfo['showcontype']): ?>
										<div class="col-md-12" >
											<div class="form-group">
												<label class="col-md-3 control-label"><?php echo e(trans('mainpage.post_type')); ?></label>
												<div class="col-md-9">
													<div class="mt-radio-list">
														<label class="mt-radio mt-radio-outline">
															<?php echo e(trans('mainpage.post_type1')); ?>

															<input type="radio" name="contype" id="optionsRadios21" value="1" <?php if(isset($data->contype) && $data->contype == '1' ){ echo 'checked'; } ?>>
															<span></span>
														</label>
														<label class="mt-radio mt-radio-outline">
															<input type="radio" name="contype" id="optionsRadios22" value="7" <?php if(isset($data->contype) && $data->contype == '7' ){ echo 'checked'; } ?>><?php echo e(trans('mainpage.post_type2')); ?>

															<span></span>
														</label>
														<label class="mt-radio mt-radio-outline">
															<input type="radio" name="contype" id="optionsRadios23" value="3" <?php if(isset($data->contype) && $data->contype == '3' ){ echo 'checked'; } ?>><?php echo e(trans('mainpage.post_type3')); ?>

															<span></span>
														</label>
														<label class="mt-radio mt-radio-outline">
															<input type="radio" name="contype" id="optionsRadios24" value="6" <?php if(isset($data->contype) && $data->contype == '6' ){ echo 'checked'; } ?>><?php echo e(trans('mainpage.post_type4')); ?>

															<span></span>
														</label>
														<label class="mt-radio mt-radio-outline">
															<input type="radio" name="contype" id="optionsRadios25" value="9" <?php if(isset($data->contype) && $data->contype == '9' ){ echo 'checked'; } ?>><?php echo e(trans('mainpage.post_type5')); ?>

															<span></span>
														</label>
														<label class="mt-radio mt-radio-outline">
															<input type="radio" name="contype" id="optionsRadios26" value="10" <?php if(isset($data->contype) && $data->contype == '10' ){ echo 'checked'; } ?>><?php echo e(trans('mainpage.post_type6')); ?>

															<span></span>
														</label>
													</div>
												</div>
												<?php if($errors->has('contype')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('contype')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
										<?php endif; ?>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
							</div>
							<?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<div class="tab-pane" id="<?php echo e('tab_'.$row->id); ?>">
								<?php if(sizeof($postLang) != 0): ?>
								<?php $__currentLoopData = $postLang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php if($rows->langid == $row->id): ?>
								<div class="form-body">
									<div class="col-md-12">
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="title"><?php echo e(trans('mainpage.address')); ?></label>
											<div class="col-md-10">
												<input type="text" class="form-control" id="title" name="title[]" value="<?php if(isset($rows->title)){ echo $rows->title; } ?>">
												<input type="hidden" class="form-control" id="lang" name="lang[]" value="<?php echo e($row->id); ?>">
											</div>
											<?php if($errors->has('title')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('title')); ?></strong>
											</span>
											<?php endif; ?>
                                                                      </div>
                                                                      

                                                                      <div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="title_en"><?php echo e(trans('mainpage.address')); ?> -en</label>
											<div class="col-md-10">
												<input type="text" class="form-control" id="title_en" name="title_en[]" value="<?php if(isset($rows->title_en)){ echo $rows->title_en; } ?>">
												<input type="hidden" class="form-control" id="lang" name="lang[]" value="<?php echo e($row->id); ?>">
											</div>
											<?php if($errors->has('title_en')): ?>
											<span class="invalid-feedback" role="title_en">
												<strong><?php echo e($errors->first('title_en')); ?></strong>
											</span>
											<?php endif; ?>
                                                                      </div>
                                                                      
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="summary"><?php echo e(trans('mainpage.descript')); ?></label>
											<div class="col-md-10">
												<textarea class="form-control" name="summary[]"><?php if(isset($rows->summary)){ echo $rows->summary; } ?></textarea>
											</div>
											<?php if($errors->has('summary')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('summary')); ?></strong>
											</span>
											<?php endif; ?>
                                                                      </div>
                                                                      

                                                                      <div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="summary_en"><?php echo e(trans('mainpage.summary_en')); ?> -en</label>
											<div class="col-md-10">
												<textarea class="form-control" name="summary_en[]"><?php if(isset($rows->summary_en)){ echo $rows->summary_en; } ?></textarea>
											</div>
											<?php if($errors->has('summary_en')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('summary_en')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="description"><?php echo e(trans('mainpage.detils')); ?></label>
											<div class="col-md-10">
												<textarea class="form-control summernote" id="description" name="description[]"><?php if(isset($rows->description)){ echo $rows->description; } ?></textarea>
											</div>
											<?php if($errors->has('description')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('description')); ?></strong>
											</span>
											<?php endif; ?>
                                                                      </div>
                                                                      

                                                                      <div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="description_en"><?php echo e(trans('mainpage.detils')); ?>-en</label>
											<div class="col-md-10">
												<textarea class="form-control summernote" id="description_en" name="description_en[]"><?php if(isset($rows->description_en)){ echo $rows->description_en; } ?></textarea>
											</div>
											<?php if($errors->has('description_en')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('description_en')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="keywords"><?php echo e(trans('mainpage.keyword')); ?></label>
											<div class="col-md-10">
												<input type="text" class="form-control select2_sample3" id="keywords" name="keywords[]" value="<?php if(isset($rows->keywords)){ echo $rows->keywords; } ?>">
											</div>
											<?php if($errors->has('keywords')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('keywords')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								<?php else: ?>
								<div class="form-body">
									<div class="col-md-12">
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="title"><?php echo e(trans('mainpage.address')); ?></label>
											<div class="col-md-10">
												<input type="text" class="form-control" id="title" name="title[]" value="<?php if(isset($rows->title)){ echo $rows->title; } ?>">
												<input type="hidden" class="form-control" id="lang" name="lang[]" value="<?php echo e($row->id); ?>">
											</div>
											<?php if($errors->has('title')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('title')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="summary"><?php echo e(trans('mainpage.descript')); ?></label>
											<div class="col-md-10">
												<textarea class="form-control" name="summary[]"><?php if(isset($rows->summary)){ echo $rows->summary; } ?></textarea>
											</div>
											<?php if($errors->has('summary')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('summary')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="description"><?php echo e(trans('mainpage.detils')); ?></label>
											<div class="col-md-10">
												<textarea class="form-control summernote" id="description" name="description[]"><?php if(isset($rows->description)){ echo $rows->description; } ?></textarea>
											</div>
											<?php if($errors->has('description')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('description')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
										<div class="form-group form-md-line-input">
											<label class="col-md-2 control-label" for="keywords"><?php echo e(trans('mainpage.keyword')); ?></label>
											<div class="col-md-10">
												<input type="text" class="form-control select2_sample3" id="keywords" name="keywords[]" value="<?php if(isset($rows->keywords)){ echo $rows->keywords; } ?>">
											</div>
											<?php if($errors->has('keywords')): ?>
											<span class="invalid-feedback" role="alert">
												<strong><?php echo e($errors->first('keywords')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							<?php if($postInfo['showembdtab']): ?>
							<div class="tab-pane" id="tab_92">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<label class="col-md-2 control-label" for="embed"><?php echo e(trans('mainpage.embd')); ?></label>
												<div class="col-md-10">
													<textarea class="form-control" id="embed" name="embed"><?php echo e(isset($data->embed) ? $data->embed : ''); ?></textarea>
												</div>
												<?php if($errors->has('embed')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('embed')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if($postInfo['showlinktab']): ?>
							<div class="tab-pane" id="tab_93">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12 morelink">
											<?php $con = 0; ?>
											<?php if(isset($postLinks) && sizeof($postLinks) != 0): ?>
											<?php $__currentLoopData = $postLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
											<div class="form-group form-md-line-input">
												<div class="col-md-5">
													<input class="form-control" name="title_link[]" placeholder="<?php echo e(trans('mainpage.address')); ?>" value="<?php if(isset($row->title)){ echo $row->title; } ?>"/>
													<input type="hidden" name="row_id[]" value="<?php if(isset($row->id)){ echo $row->id; } ?>"/>
												</div>
												<div class="col-md-5">
													<input class="form-control" name="url[]" placeholder="<?php echo e(trans('mainpage.link')); ?>" value="<?php if(isset($row->url)){ echo $row->url; } ?>"/>
												</div>
												<?php if( $con == 0){ ?>
												<div class="col-md-2">
													<div class="itemapts">
														<button  type="button" class="btn green"><?php echo e(trans('mainpage.add')); ?></button>
													</div>
												</div>
												<?php if($errors->has('embed')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('embed')); ?></strong>
												</span>
												<?php endif; ?>
												<?php } ?>
											</div>
											<?php $con++; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
											<?php else: ?>
											<div class="form-group form-md-line-input">
												<div class="col-md-5">
													<input class="form-control" name="title_link[]" placeholder="<?php echo e(trans('mainpage.address')); ?>" value=""/>
												</div>
												<div class="col-md-5">
													<input class="form-control" name="url[]" placeholder="<?php echo e(trans('mainpage.link')); ?>" value=""/>
												</div>
												<?php if( $con == 0){ ?>
												<div class="col-md-2">
													<div class="itemapts">
														<button  type="button" class="btn green"><?php echo e(trans('mainpage.add')); ?></button>
													</div>
												</div>
												<?php if($errors->has('embed')): ?>
												<span class="invalid-feedback" role="alert">
													<strong><?php echo e($errors->first('embed')); ?></strong>
												</span>
												<?php endif; ?>
												<?php } ?>
											</div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-actions noborder pulllefts">
											<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if($postInfo['showoptiontab']): ?>
							<div class="tab-pane" id="tab_95">
								<div class="col-md-6 col-md-offset-3">
									<div class="form-group form-md-line-input allitemos">
									</div>
									<div class="form-actions noborder pulllefts">
										<button  type="submit" type="button" class="btn blue"><?php echo e(trans('mainpage.save')); ?></button>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if($postInfo['showgallerytab']): ?>
							<div class="tab-pane" id="tab_91">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											
											
											<div class="form-group form-md-line-input">
												<div action="<?php echo e(url('/adminpanel/'.$postInfo['service'].'/imageupload/'.$id)); ?>" class="dropzone" method="POST" id="my-dropzone" enctype="multipart/form-data">
													<?php echo e(csrf_field()); ?>

												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group form-md-line-input">
												<?php if(isset($postGallery)){ ?>
												<ul class="view_imageers">
													<?php $__currentLoopData = $postGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
													<li id="<?php echo e($row->id); ?>" data-sort=<?php echo e($row->sortable); ?>>
														<a href="<?php echo e(url('/adminpanel/'.$postInfo['service'].'/deleteimage/'.$row->id)); ?>"><i class="fa fa-trash"></i></a>
														<span class="icon-move"><i class="fa fa-arrows"></i></span>
														<?php
														$items = explode('.', $row->file);
														$type = $items[sizeof($items)-1];
														?>
														<?php if($type == 'pdf' || $type == 'PDF'): ?>
														<a class="itemme" href="<?php echo e(url('/media/'.$postInfo['service'].'/gallery/'.$row->path.'/'.$row->file)); ?>">
															<img src="<?php echo e(url('/front/images/PDF.png')); ?>" />
														</a>
														<?php else: ?>
														<img src="<?php echo e(url('/media/'.$postInfo['service'].'/gallery/'.$row->path.'/'.$row->file)); ?>" />
														<?php endif; ?>
														
													</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
												</ul>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('admin.content.body_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_level_plugins_js'); ?>
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/moment.min.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> -->
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/yusuf/bootstrap-tagsinput.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="<?php echo e(url('/')); ?>/admin/assets/yusuf/sortable.min.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_level_scripts_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
jQuery(document).ready( function ($){
$(".view_imageers").sortable({
handle: '.icon-move',
stop: function(en , ui){
var item = $(".view_imageers").sortable("toArray");
$.ajax({
url: "<?php echo e(url('/adminpanel/'.$postInfo['service'].'/resort')); ?>",
type: "post",
data: {
"_token":"<?php echo e(csrf_token()); ?>",
"item":item
},
dataType:'JSON',
success: function (data) {
console.log('success');
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
}
});
});
</script>
<script>
$( function () {
$(".caption-subject").click( function() {
var item = $(".view_imageers").sortable("toArray");
console.log(item);
});
$("#my-dropzone").dropzone({
url: "<?php echo e(url('/adminpanel/'.$postInfo['service'].'/imageupload/'.$id)); ?>",
addRemoveLinks : false,
//maxFilesize: 5,
dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
dictResponseError: 'Error uploading file!',
params: {
'_token': $('meta[name="csrf-token"]').attr('content')
},
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
});
</script>
<script>
/*var FormDropzone = function () {
return {
//main function to initiate the module
init: function () {
Dropzone.options.myDropzone = {
init: function() {
this.on("addedfile", function(file) {
// Create the remove button
var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
// Capture the Dropzone instance as closure.
var _this = this;
// Listen to the click event
removeButton.addEventListener("click", function(e) {
// Make sure the button click doesn't submit the form:
e.preventDefault();
e.stopPropagation();
// Remove the file preview.
_this.removeFile(file);
// If you want to the delete the file on the server as well,
// you can do the AJAX request here.
});
// Add the button to the file preview element.
file.previewElement.appendChild(removeButton);
});
}
}
}
};
}();*/
</script>
<script>
jQuery(document).ready( function ($){
$('.itemapts button').click( function(e){
$('.morelink').append('<div class="form-group form-md-line-input"><div class="col-md-5"><input class="form-control" name="title_link[]" placeholder="<?php echo e(trans("mainpage.address")); ?>" /><input type="hidden" name="row_id[]" value="-1"/></div><div class="col-md-5"><input class="form-control" name="url[]" placeholder="<?php echo e(trans("mainpage.link")); ?>"/></div></div>')
});
});
</script>
<script>
jQuery(document).ready( function ($){
$('#image').change( function(e){
var images = $(this).length;
console.log(image);
for(var i=0 ; i < image.length ; i++){
}
});
});
</script>
<script type="text/javascript">
jQuery(document).ready( function ($){
$('.view_imageers a').click(function(e){
e.preventDefault();
var id = $(this).attr('href');
$(this).addClass('redfordelete');
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url: id,
type: "get",
success: function (data) {
console.log(data);
showError("<?php echo e(trans('mainpage.success')); ?>",'success',true);
$('.view_imageers').find('.redfordelete').parent().remove();
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
showError("<?php echo e(trans('mainpage.error')); ?>",'error',true);
$('.view_imageers').find('.redfordelete').removeClass('redfordelete');
}
});
});
});
</script>
<script type="text/javascript">
jQuery(document).ready( function ($){
$('#parentid').change(function(){
var id = $(this).val();
$('.submensuw .mainselect').remove();
$('.submensuw .form-group.form-md-line-input').remove();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url: "<?php echo e(url('/')); ?>/adminpanel/department/submenu/"+id,
type: "get",
success: function (data) {
console.log(data.length);
if(data.length != 0){
$('.submensuw').show();
$('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu"><?php echo e(trans("mainpage.menu")); ?></label><div class="col-md-10"><select class="select2_category newoption form-control" id="submenu" tabindex="1" name="submenu[]"><option value=""><?php echo e(trans("mainpage.menu_chose")); ?></option></select></div></div>');
for(var i=0 ; i < data.length ; i++){
$('.submensuw').find('.itsssems'+id).find('select').append('<option value="'+data[i].id+'">'+data[i].shortname+'</option>')
}
}
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
});
});
</script>
<script type="text/javascript">
$(document).on("change",'.selectiteps select' , function(){
var id = $(this).val();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url: "<?php echo e(url('/')); ?>/adminpanel/department/submenu/"+id,
type: "get",
success: function (data) {
console.log(data.length);
if(data.length != 0){
$('.submensuw').show();
$('.submensuw').append('<div class="form-group form-md-line-input mainselect itsssems'+id+'" data-id="'+id+'"><label class="col-md-2 control-label" for="submenu"><?php echo e(trans("mainpage.menu")); ?></label><div class="col-md-10"><select class="select2_category newoption form-control" id="submenu" tabindex="1" name="submenu[]"><option value=""><?php echo e(trans("mainpage.menu_chose")); ?></option></select></div></div>');
for(var i=0 ; i < data.length ; i++){
$('.submensuw').find('.itsssem'+id).find('select').append('<option value="'+data[i].id+'">'+data[i].shortname+'</option>')
}
}
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
});
</script>
<script type="text/javascript">
$(document).ready(function () {
var id = $('.newoption').val();
var postid = "<?php echo e(isset($id) ? $id : 'null'); ?>";
newoption_change(id,postid);
});
$(document).on("change",'.newoption' , function(){
var id = $(this).val();
var postid = "<?php echo e(isset($id) ? $id : 'null'); ?>";
newoption_change(id,postid);
});
function newoption_change(id,postid){
$.ajax({
url: "<?php echo e(url('/')); ?>/adminpanel/department/getoptionmenu/"+id+"/"+postid,
type: "get",
success: function (data) {
for (var i = 0; i < data.length; i++) {
if(data[i].length != 0){
// for (var c = 0; c < data[i].length; c++) {
var item = data[i];
// console.log(item);
if(item.types == 'text'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="text" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'textarea'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><textarea class="form-control" name="'+item.optnid+'">'+item.val_item+'</textarea></div></div>');
}
if(item.types == 'colorpicker'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="color" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'date' || item.types == 'datepicker' || item.types == 'timepicker'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="date" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'editor'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><textarea class="form-control summernote" name="'+item.optnid+'">'+item.val_item+'</textarea></div></div>');
}
if(item.types == 'number'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="number" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'image' || item.types == 'file'){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><input type="file" class="form-control" id="optnval" name="'+item.optnid+'" value="'+item.val_item+'"></div></div>');
}
if(item.types == 'radiobutton'  && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><div class="mt-radio-list item_'+item.id+'"></div></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
if(item.val_item == list.id){
$('.allitemos').find('.item_'+item.id).append('<label class="mt-radio mt-radio-outline"><input type="radio" name="'+item.optnid+'" id="optionsRadios'+list.id+'" value="'+list.id+'" checked>'+list.title_name+'<span></span></label>');
}else{
$('.allitemos').find('.item_'+item.id).append('<label class="mt-radio mt-radio-outline"><input type="radio" name="'+item.optnid+'" id="optionsRadios'+list.id+'" value="'+list.id+'">'+list.title_name+'<span></span></label>');
}
}
}
}
if(item.types == 'multicheckbox' && item.item_list.length != 0 || item.types == 'checkbox' && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><div class="mt-checkbox-list item_'+item.id+'"></div></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
var ip = item.val_item;
var c = 0;
for (var p = 0; p < ip.length; p++) {
if(list.id == ip[p]){
$('.allitemos').find('.item_'+item.id).append('<label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" name="'+item.optnid+'[]" id="optionsRadioss'+list.id+'" value="'+list.id+'" checked>'+list.title_name+'<span></span></label>');
var c = c+1;
}
}
if(c == 0){
$('.allitemos').find('.item_'+item.id).append('<label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" name="'+item.optnid+'[]" id="optionsRadioss'+list.id+'" value="'+list.id+'">'+list.title_name+'<span></span></label>');
}
}
}
}
if(item.types == 'select' && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><select class="select2_category form-control item_'+item.id+'" id="optnval" tabindex="1" name="'+item.optnid+'"><option value=""></option></select></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
if(item.val_item == list.id){
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'" selected>'+list.title_name+'</option>');
}else{
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'">'+list.title_name+'</option>');
}
}
}
}
if(item.types == 'multiselect'  && item.item_list.length != 0){
$('.allitemos').append('<div class="form-group form-md-line-input"><label class="col-md-2 control-label" for="optnval">'+item.list_title+'</label><div class="col-md-10"><select class="select2_category form-control item_'+item.id+'" id="optnval" tabindex="1" name="'+item.optnid+'" multiselect ><option value=""></option></select></div></div>');
if(item.item_list){
for (var b = 0; b < item.item_list.length; b++) {
var list = item.item_list[b];
if(item.val_item == list.id){
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'" selected>'+list.title_name+'</option>');
}else{
$('.allitemos').find('.item_'+item.id).append('<option value="'+list.id+'">'+list.title_name+'</option>');
}
}
}
}
// }
}
}
console.log('done');
},
error: function (xhr, ajaxOptions, thrownError) {
console.log('Error');
}
});
};
</script>
<script>
$('.select2_category').select2({
placeholder: "Select an option",
allowClear: true
});
$(".select2_sample3").tagsinput();
</script>
<script>
$(document).ready(function() {
$(".summernote").summernote({
height:150
});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>