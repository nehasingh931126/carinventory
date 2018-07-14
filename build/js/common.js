$(document).ready(function() {
    var date_input=$('input[name="manufacturing_year"]'); //our date input has the name "date"
      var container="body";
      var options={
        format: 'yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
    date_input.datepicker(options);
    
    $('#manufacturer_form,#model_form').validate({ // initialize the plugin
        rules: {
            manufacturer_name: {
                required: true,
                someValue:true
            },
            model_name: {
                required: true,
                regex: /^[ a-zA-Z.]+$/
            },
            color: {
                regex: /^[ a-zA-Z.]+$/
            },
            manufacturing_year: {
                required: true,
            },
            registration_number: {
                required: true,
                regex: /^[ 0-9]+$/
            },
            notes: {
                required: true,
                regex: /^[ a-zA-Z0-9.()]+$/
            },
            model_count:{
                required:true,
                regex: /^[0-9]+$/
            },
            "file_upload[]": {
                required: true,
                maxFilesToSelect : 2
            }
            
        },
        messages: {
            manufacturer_name:{
                    required: '* Manufacturer Name is required field.',
                    regex: 'Please enter a valid Manufacturer Name.'
                },
            model_name:{
                required: '* Model Name is required field.',
                regex: 'Please enter a valid Model Name.'
            },
            color:{
                required: '* Color is required field.',
                regex: 'Please enter a valid Color.'
            },
            manufacturing_year:{
                required: '* Manufacturing year is required field.',
                regex: 'Please enter a valid Manufacturing year.'
            },
            registration_number:{
                required: '* Registration Number is required field.',
                regex: 'Please enter a valid Registration Number.'
            },
            notes:{
                required: '* Notes is required field.',
                regex: 'Please enter a valid Notes.'
            },
            model_count : {
                required: '* Model Count is required field.',
                regex: 'Please enter Valid Count Number.',
            },
            "file_upload[]":{
                required: '* File is required field.',
                regex: 'Please enter a valid File 2.',
                maxFilesToSelect: "You can only upload a maximum of 2 images",
            },
            
        }
    });
    $.validator.addMethod("regex", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    }, "Please Provide a Valid Input.");
    $.validator.addMethod("someValue", function(value, element, arg){
        return (value != '');
    }, "Please Select Manufacturere Name.");
    $.validator.addMethod("maxFilesToSelect", function(value, element, params) {
            var fileCount = element.files.length;
            if(fileCount > params){
                return false;
            }
            else{
                return true;
            }
    }, 'Select no more than 2 files');
});