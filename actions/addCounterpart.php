<?php ?><li class="nav-item">
    <div class="section-title" name ="counterpart_name">CRITERE DE DONS N°2</div>
        <div class="form-group">    
            <input type="number" min="0" class="form-control-input" id="don_min" name="option_min" minlength="8" required>
            <label class="label-control" for="cmdp">Don minimum</label>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">    
            <input type="number" min = "0" class="form-control-input" id="don_max" name="option_max" minlength="8" required>
            <label class="label-control" for="cmdp">Don maximum</label>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">    
            <input type="text" class="form-control-input" id="counter" name="counterpart_description" minlength="8" required>
            <label class="label-control" for="cmdp">En échange du don</label>
            <div class="help-block with-errors"></div>
        </div>
</li>
<?php  ?>