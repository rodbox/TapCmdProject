<!-- <div id="editor-parse-<?php echo $d['id'] ?>" class="sui-editor-parse">
        <div class="sui-editor-parse-body">
            <?php
            // echo"<pre>";
            // print_r($d['parse']);
            // echo"</pre>";
            ?>
        </div>
    </div> -->

    <textarea id="cm-ediror-<?php echo $d['id'] ?>" class="cm"><?php echo file_get_contents($d['file'])  ?></textarea>