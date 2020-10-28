<script>

$("#checkPermissionAll").click(function(){
        if($(this).is(':checked')){
           //check all the check
           $('input[type=checkbox]').prop('checked', true);
        }else{
           //un check all the check
           $('input[type=checkbox]').prop('checked', false);
        }
     })
  
      function checkPermissionByGroup(className, checkThis){
        const groupIdName = $("#"+checkThis.id);
        const  classCheckBox = $('.'+className+' input');
  
        if(groupIdName.is(':checked')){
           classCheckBox.prop('checked', true);
        }else{
           classCheckBox.prop('checked', false);
        }
        implementAllChecked();
      }

      function checkSinglePemission(groupClassName, groupId, countTotalPermission){

         const classCheckBox = $('.'+groupClassName+ ' input');
         const groupIDCheckBox = $("#"+groupId);
         
         //if there is any occurence where something is not selected then make selected 
         if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
            groupIDCheckBox.prop('checked', true)
         }else{
            groupIDCheckBox.prop('checked',false)
         }
         implementAllChecked();
      }

      function implementAllChecked(){
         const countPermissions = {{ count($all_permissions) }};
         const countPermissionsGroups = {{ count($permission_groups) }};

         if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionsGroups) ){
            $("#checkPermissionAll").prop('checked', true)
         }else{
            $("#checkPermissionAll").prop('checked',false)
         }
      }  

</script>