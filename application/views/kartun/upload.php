<?php
$this->load->view("skeleton/head");
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/pikaday.css'); ?>" media="screen" title="no title" charset="utf-8">
<body>

    <div class="wrapper">

        <?php
        $this->load->view("skeleton/sidebar")
        ?>

        <?php
        $this->load->view("skeleton/topmenu")
        ?>

    <?php echo form_open_multipart('/kartun/data'); ?>
    <br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="header">
                                <div class="pull-left">
                                        <h4 class="title">Kartun PENS</h4>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                            </div>
                            <div class="content">
                                <form action="post" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p>Judul</p>
                                                <input type="text" id="title_id" class="form-control" name="judul" value="" placeholder="Isi Judul Untuk Kartun">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p>Keterangan</p>
                                                    <textarea name="keterangan" class="post" id="content_id" rows="8" cols="40"></textarea><br>
                                            </div>
                                        </div>
                                    </div>
                                      
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p>Url</p>
                                                <input type="text" id="title_id" class="form-control" name="url" value="" placeholder="Isi Url Untuk Kartun">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p>Posisi</p>
                                                <input type="text" id="title_id" class="form-control" name="posisi" value="" placeholder="???????">
                                            </div>
                                        </div>
                                    </div>

                                    <p>Upload Gambar disini</p>
                                    <input id="file" type="file" name="userfile">
                                    <input hidden name="gambar" id="gambar" type="text" />

                                    <script type="text/javascript">
                                    document.getElementById('file').onchange = uploadOnChange;

                                    function uploadOnChange() {
                                        var gambar = this.value;
                                        var lastIndex = gambar.lastIndexOf("\\");
                                        if (lastIndex >= 0) {
                                            gambar = gambar.substring(lastIndex + 1);
                                        }
                                        document.getElementById('gambar').value = gambar;
                                    }
                                    </script>  
                                    <div class="row snippet-field">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <br>
                                            <button type="submit" class="btn btn-success pull-right btn-fill" name="upload" value="upload">Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php echo form_close();?>


        <?php
        $this->load->view("skeleton/footer")
        ?>

    </div>
</body>
<?php
$this->load->view("skeleton/mainscript")
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/tinymce/tinymce.min.js'); ?>"></script>
<script type="text/javascript">
tinyMCE.init({
    selector:'textarea',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen autoresize',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
    ]
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#translate-btn").click(function(){
        btn = $(this);
        content = tinyMCE.get('content_id').getContent({format: 'text'});
        btn.attr('disabled','disabled');
        btn.html('Translating...');
        title = $('#title_id').val();
        $.post('http://ent.pens.ac.id/translator/',{'content_id':content,'title_id':title},function(data){
            data = $.parseJSON(data);
            tinyMCE.get('content_en').setContent(data['content']);
            $('#title_en').val(data['title']);
            btn.attr('disabled',false);
            btn.html('Translate');
        })
    })
})
</script>
</html>
