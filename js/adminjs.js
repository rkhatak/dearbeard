/*
 * This class is related to admin task
 *  Auther R.k
 *  date 21/10/17
 */

class Adminjs{
     constructor(){
       this.resizeImage="";
       this.imageContainer="";
       this.imageInputId="";
    }
    croppic(){
       var self=this; 
       $('#r_product_temp_f_image').on('change',function(e){
         self.imageContainer=$('#r_feature_image_preview');  
         self.imageInputId='r_apppended_crop_image';
           
          var that=this; 
          var file = that.files[0];
          var imagefile = file.type;
          var match= ["image/jpeg","image/png","image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
            {
                alert('Only jpeg, jpg and png Images type allowed');
                return false;
            } else
            {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    
                    $.ajax({
                    type: "POST",
                    url: '../tempCroppic.php',
                    data: {image:e.target.result},
                    success: function (response)
                    {       $('#r_feature_img').attr('src',response);
                            $('#modal-default').show();
                            
                            
                            $('#r_feature_img').rcrop({
                                minSize: [200, 250],
                                preserveAspectRatio: false,
                                preview: {
                                    display: false,
                                    size: [100, 100],
                                    wrapper: '#custom-preview-wrapper'
                                }
                            });
                            
                            var counter=0;
                            
                            $('#r_feature_img').rcrop('getRealSize');
                            
                            self.imageContainer.html(' ');
                            
                             $('#r_preview_image_error').html(' ');
                             
                            self.imageContainer.append('<input type="hidden" name="r_feature_image" id="'+self.imageInputId+'" value=""/>');
                            
                            $('#r_feature_img').on('rcrop-changed', function(){
                                self.resizeImage = $(this).rcrop('getDataURL', 500, 500);
                                $('#'+self.imageInputId).val(self.resizeImage);
                            });
                    }
                });
                }
               reader.readAsDataURL(that.files[0])

            }
          
          
       }); 
       $('#file').on('change',function(e){
           self.imageContainer=$('#r_product_image_preview'); 
           self.imageInputId='r_apppended_crop_image_product';
          var that=this; 
          var file = that.files[0];
          var imagefile = file.type;
          var match= ["image/jpeg","image/png","image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
            {
                alert('Only jpeg, jpg and png Images type allowed');
                return false;
            } else
            {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    
                    $.ajax({
                    type: "POST",
                    url: '../tempCroppic.php',
                    data: {image:e.target.result},
                    success: function (response)
                    {       $('#r_feature_img').attr('src',response);
                            $('#modal-default').show();
                            
                            
                            $('#r_feature_img').rcrop({
                                minSize: [200, 250],
                                preserveAspectRatio: false,
                                preview: {
                                    display: false,
                                    size: [100, 100],
                                    wrapper: '#custom-preview-wrapper'
                                }
                            });
                            
                            var counter=0;
                            
                            $('#r_feature_img').rcrop('getRealSize');
                            
                            self.imageContainer.html(' ');
                            
                             $('#r_preview_image_error').html(' ');
                             
                            self.imageContainer.append('<input type="hidden" name="product_img[]" id="'+self.imageInputId+'" value=""/>');
                            
                            $('#r_feature_img').on('rcrop-changed', function(){
                                self.resizeImage = $(this).rcrop('getDataURL', 500, 500);
                                $('#'+self.imageInputId).val(self.resizeImage);
                            });
                    }
                });
                }
               reader.readAsDataURL(that.files[0])

            }
          
          
       }); 
       $(document.body).on('change','.fileMore',function(e){
           var getDynamicInputId=e.currentTarget.id;
           var getDynamicId=getDynamicInputId.split('_');
           getDynamicId=getDynamicId[1];
           
           self.imageContainer=$('#rproductimagepreview_'+getDynamicId); 
           self.imageInputId='r_apppended_crop_image_product'+getDynamicId;
          var that=this; 
          var file = that.files[0];
          var imagefile = file.type;
          var match= ["image/jpeg","image/png","image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
            {
                alert('Only jpeg, jpg and png Images type allowed');
                return false;
            } else
            {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    
                    $.ajax({
                    type: "POST",
                    url: '../tempCroppic.php',
                    data: {image:e.target.result},
                    success: function (response)
                    {       $('#r_feature_img').attr('src',response);
                            $('#modal-default').show();
                            
                            
                            $('#r_feature_img').rcrop({
                                minSize: [200, 250],
                                preserveAspectRatio: false,
                                preview: {
                                    display: false,
                                    size: [100, 100],
                                    wrapper: '#custom-preview-wrapper'
                                }
                            });
                            
                            var counter=0;
                            
                            $('#r_feature_img').rcrop('getRealSize');
                            
                            self.imageContainer.html(' ');
                            
                             $('#r_preview_image_error').html(' ');
                             
                            self.imageContainer.append('<input type="hidden" name="product_img[]" id="'+self.imageInputId+'" value=""/>');
                            
                            $('#r_feature_img').on('rcrop-changed', function(){
                                self.resizeImage = $(this).rcrop('getDataURL', 500, 500);
                                $('#'+self.imageInputId).val(self.resizeImage);
                            });
                    }
                });
                }
               reader.readAsDataURL(that.files[0])

            }
          
          
       }); 
       $('.r_popup_close').on('click',function(){
                                $('#modal-default').hide();
                            });
       $('.r_submit_crop_image').on('click',function(e){
                               e.stopPropagation();
                               if($.trim($('#'+self.imageInputId).val())==''){
                                   $('#r_preview_image_error').html('Please select your image location');
                                   return false;
                               }
                              
                               self.imageContainer.append('<img src="'+self.resizeImage+'" style="width:100px;height:100px">');
                               $('#modal-default').hide();
                           });
    }
    addMore(){
        var counter=0;
        $('#add_more').on('click',function(){
            counter+=1;
            var addMoreFile=`<div class="form-group">
                                    <label>Product Other Images</label>                
                                        <div id="filediv">
                                            <input type="file" name="product_img[]" class="fileMore" id="fileMore_${counter}"/>
                                            <div id="rproductimagepreview_${counter}"></div>                 
                                        </div>
                                        <div><a href="javascript:void(0)" class="r_remove_filemore" id="rremovefilemore_${counter}">Remove File</a></div>
                             </div>`;
          $('#r_addmore_files_append').append(addMoreFile);
        });
        $(document.body).on('click','.r_remove_filemore',function(e){
            var self=$(e.currentTarget);
           self.parent().parent().remove();
        })
    }
    
}

var adminJs=new Adminjs();
adminJs.croppic();
adminJs.addMore();