<style>
#jadwal,#jadwal1 {
    width:100px;
    height:50px;
    padding:10px;
    border:1px solid #aaaaaa;
    float:left;
    margin-right:10px;
    position:relative;
    overflow:hidden}
}
#div1,#div2 {
    width:300px;
    height:150px;
    padding:10px;
    border:1px solid #aaaaaa;
    float:left;
    margin-right:10px;
    position:relative;
    overflow:hidden}
</style>
<script>
function allowDrop(ev) {
ev.preventDefault();
}function drag(ev) {
ev.dataTransfer.setData("text", ev.target.id);
}function drag1(ev) {
ev.dataTransfer.setData("text", ev.target.id);
}function drag2(ev) {
ev.dataTransfer.setData("text", ev.target.id);
}function drag3(ev) {
ev.dataTransfer.setData("text", ev.target.id);
}function drop(ev) {
ev.preventDefault();
var data = ev.dataTransfer.getData("text");
ev.target.appendChild(document.getElementById(data));

}    
 //eksekusi update

</script>
<section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Pilih jadwal</h4>
                </div>
                <div class="box-body" id="div1"   ondragover="allowDrop(event)" ondragstart="drag(event)">
                  <!-- the events -->
                  <div id='external-events'>
                    <div id="drag" draggable="true" ondragstart="drag(event)" class='external-event bg-green'>Jaga 1</div>
                    <div id="drag1" draggable="true" ondragstart="drag1(event)" class='external-event bg-yellow'>Jaga 2</div>
                    <div id="drag2" draggable="true" ondragstart="drag2(event)" class='external-event bg-aqua'>Jaga 3</div>
                    <div id="drag3" draggable="true" ondragstart="drag3(event)" class='external-event bg-light-blue'>Jaga 4</div>
                    
                    <div class="checkbox">
                      <label for='drop-remove'>
                        <input type='checkbox' id='drop-remove' />
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
             
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <div class="box-body table-responsive no-padding">
                     <form method="POST">
                      <table class="table table-hover">
                        <tr>
                            <th>Shift</th>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jumat</th>
                            <th>Sabtu</th>
                        </tr>
                        <tr>
                            <td>Shift 1</td>
                            <td><div id="jadwal1" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                        </tr>
                         <tr>
                            <td>Shift 2</td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                        </tr>
                         <tr>
                            <td>Shift 3</td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                        </tr>
                         <tr>
                            <td>Shift 4</td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                            <td><div id="jadwal" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)"></div></td>
                        </tr>

                    </table>
            </forom>
            </div>
                  <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)" ondragstart="drag(event)">
</div>

                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

<script type="text/javascript">

</script>