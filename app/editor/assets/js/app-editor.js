$(document).ready(function($) {

/**
     * le cm en focus
     */
    $.editor = {};

    /**
     * Contient la liste de tout les cm indexer par id
     */
    $.editors = {};


    /**
     * Type d'editeur par id
     */
    $.editorsType = {}

    /**
     * Initialise un editeur en fonction de son type
     */
    $.editorInit = {
        default: function (){
            /**
            * TODO : Init paper Default
            **/
        },
        txt: function (t, json, e){
            var  t = $('#summernote-'+json.id)
            var editor = t.summernote({
                tabsize: 2,
                disableDragAndDrop: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['insert', ['codeview']]
                ],
                onkeyup: function (e) {
                    // console.log($(this).code());
                    t.val($(this).code());
                    t.change(); //To update any action binded on the control
                }
            });
            $('.note-popover').css({'display': 'none'});
            $.editors[json.id] = editor;

        },
        pdf: function (){
            /**
            * TODO : Init paper PDF
            **/
        },
        img: function (t, json, e){
            /**
            * TODO : Init paper js
            **/
            $.editors[json.id] = document.getElementById("myCanvas_"+json.id);

            // $.getScript("app/editor/assets/js/app-paper.js")


            // $('body').append('');

            // console.log($.editors[json.id]);
        },
        code: function (t, json, e){
            /**
            * TODO : FIxer le init de codemirror avec la fonctio global.
            **/
            $.cb['editor'][json.cb](t, json, e);
            $.cm.init(json.id);
            $.cb.editor.setEditor(t, json, e);
        },
        zip: function (){

        }
    }

    /**
     * Retourne la valeur de l'editeur en fonction de son type
     */
    $.editorGetValue = {
        default: function (id){
            /**
            * TODO : Get editor Default Value
            **/
        },
        txt: function (id){
            return $.editors[id].val();
        },
        pdf: function (id){
            /**
            * TODO : Get Pdf
            **/
        },
        img: function (id){

            var canvasID = "myCanvas_"+id;
            var img      = document.getElementById(canvasID);
            var context  = img.getContext('2d');
            var ext      = 'png';
            var imgData  = img.toDataURL("image/"+ext);
            var img      = {
                ext   : ext,
                img   : imgData
            };

            return img;
        },
        code: function (id){
            return $.editors[id].getValue();
        },
        zip: function (id){

        },
    }


});