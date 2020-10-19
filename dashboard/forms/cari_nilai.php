<?php 
    if (isset($_SESSION['access'])) {
        if ($_SESSION['access'] == 'siswa') {
            if (isset($_POST['cari-nilai'])) {
                include('tables/nilai1_table.php');
            }else{
?>
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-lightred">
            <span class="widget-caption">Cari Nilai Form</span>
        </div>
        <div class="widget-body">
            <div id="horizontal-form">
                <form class="form-horizontal" role="form" method="POST">                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Semester</label>
                        <div class="col-sm-10">
                            <select id="e5" style="width:100%;" name="semester" required>
                                <?php 
                                    $semester  =   mysqli_query($koneksi,"SELECT * FROM semester");

                                    while ($data=mysqli_fetch_assoc($semester)) {
                                ?>
                                <option value="<?php echo $data['semester_id']; ?>"><?php echo $data['semester_nama']; ?></option>
                                <?php
                                    }
                                ?>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <select id="e1" style="width:100%;" name="tahun" required>
                                <?php 
                                    $tahun  =   mysqli_query($koneksi,"SELECT * FROM tahun");

                                    while ($data=mysqli_fetch_assoc($tahun)) {
                                ?>
                                <option value="<?php echo $data['tahun_id']; ?>"><?php echo $data['tahun_nama']; ?></option>
                                <?php
                                    }
                                ?>                                                                
                            </select>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="cari-nilai">Cari</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
            }
        }elseif ($_SESSION['access'] == 'guru' OR 'admin') {
            if (isset($_POST['cari-nilai'])) {
                include('tables/nilai2_table.php');
            }else {
?>
<div class="col-lg-12 col-sm-12 col-xs-12">
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-lightred">
            <span class="widget-caption">Cari Nilai Form</span>
        </div>
        <div class="widget-body">
            <div id="horizontal-form">
                <form class="form-horizontal" role="form" method="POST">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <select id="e1" style="width:100%;" name="pelajaran" required>
                                <?php 
                                    $pelajaran  =   mysqli_query($koneksi,"SELECT * FROM pelajaran");

                                    while ($data=mysqli_fetch_assoc($pelajaran)) {
                                ?>
                                <option value="<?php echo $data['pelajaran_id']; ?>"><?php echo $data['pelajaran_nama']; ?></option>
                                <?php
                                    }
                                ?>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Kelas</label>
                        <div class="col-sm-10">
                            <select id="e2" style="width:100%;" name="kelas" required>
                                <?php 
                                    $kelas  =   mysqli_query($koneksi,"SELECT * FROM kelas");

                                    while ($data=mysqli_fetch_assoc($kelas)) {
                                ?>
                                <option value="<?php echo $data['kelas_id']; ?>"><?php echo $data['kelas_nama']; ?></option>
                                <?php
                                    }
                                ?>                                                                
                            </select>
                        </div>
                    </div>                 
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Semester</label>
                        <div class="col-sm-10">
                            <select id="e3" style="width:100%;" name="semester" required>
                                <?php 
                                    $semester  =   mysqli_query($koneksi,"SELECT * FROM semester");

                                    while ($data=mysqli_fetch_assoc($semester)) {
                                ?>
                                <option value="<?php echo $data['semester_id']; ?>"><?php echo $data['semester_nama']; ?></option>
                                <?php
                                    }
                                ?>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <select id="e4" style="width:100%;" name="tahun" required>
                                <?php 
                                    $tahun  =   mysqli_query($koneksi,"SELECT * FROM tahun");

                                    while ($data=mysqli_fetch_assoc($tahun)) {
                                ?>
                                <option value="<?php echo $data['tahun_id']; ?>"><?php echo $data['tahun_nama']; ?></option>
                                <?php
                                    }
                                ?>                                                                
                            </select>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" name="cari-nilai">Cari</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
            }
        }
    }
?>