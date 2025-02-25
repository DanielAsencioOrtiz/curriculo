@extends('admin.layouts._principal')

@section('css')

@endsection

@section('titulo')

<div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Malla Curricular de : {{$programa_estudio->nombre_programa}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item active">Malla Curricular</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('contenido')
<div class="container">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="background-color: #F33154; color: white; border-radius: 10px">
                    <h2  align="center">MALLA CURRICULAR</h2>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-1">
                    <a href="#" data-toggle="modal" data-target="#info" 
                         class="btn btn-block btn-info"><i class="fa fa-question"></i></a>
                </div>
            </div>
        </div>
        @if (session('mensaje'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            @if (!is_null($malla->malla))
            <div class="row">
                <div class="col-sm-12" align="center">
                    <label for="">Ver Archivo de Malla Curricular Cargado: </label>
                    <a href="{{asset('./mallas/'.$malla->malla)}}" target="_blank"><img width="10%" src="{{asset('./pdf.png')}}" alt="pdf"></a>
                </div>
            </div>
            @endif
           
            <form action="{{route('malla.update')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <label>@if (!is_null($malla->malla))Reemplazar el Archivo:@else Cargar el Archivo @endif </label>
                        <input type="file" class="form-control" type="pdf" name="malla" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <a href="{{route('home')}}" class="btn btn-default btn-block">ATRÁS</a>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success btn-block">GUARDAR CAMBIOS</button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>


            <!--de aqui-->
            <div class="md:flex flex-col md:flex-row md:min-h-screen w-full max-w-screen-xl mx-auto">
              <div id="navSide" class="flex flex-col w-full md:w-48 text-gray-700 bg-white flex-shrink-0"></div>
              <!-- * * * * * * * * * * * * * -->
              <!-- Start of GoJS sample code -->
              
              <script src="{{asset('release/go.js')}}"></script>
              <div class="p-4 w-full">
              <script id="code">
              function init() {
                var $ = go.GraphObject.make;  // for conciseness in defining templates
          
                myDiagram = $(go.Diagram, "myDiagramDiv",  // create a Diagram for the DIV HTML element
                  {
                    "linkingTool.isEnabled": false,  // invoked explicitly by drawLink function, below
                    "linkingTool.direction": go.LinkingTool.ForwardsOnly,  // only draw "from" towards "to"
                    "undoManager.isEnabled": true  // enable undo & redo
                  });
          
                myDiagram.linkTemplate =
                  $(go.Link,
                    { routing: go.Link.AvoidsNodes, corner: 5 },
                    $(go.Shape, { strokeWidth: 1.5 }),
                    $(go.Shape, { toArrow: "OpenTriangle" })
                  );
          
                myDiagram.nodeTemplate =
                  $(go.Node, "Auto",
                    {
                      desiredSize: new go.Size(80, 80),
                      // rearrange the link points evenly along the sides of the nodes as links are
                      // drawn or reconnected -- these event handlers only make sense when the fromSpot
                      // and toSpot are Spot.xxxSides
                      linkConnected: function(node, link, port) {
                        if (link.fromNode !== null) link.fromNode.invalidateConnectedLinks();
                        if (link.toNode !== null) link.toNode.invalidateConnectedLinks();
                      },
                      linkDisconnected: function(node, link, port) {
                        if (link.fromNode !== null) link.fromNode.invalidateConnectedLinks();
                        if (link.toNode !== null) link.toNode.invalidateConnectedLinks();
                      },
                      locationSpot: go.Spot.Center
                    },
                    new go.Binding("location", "location", go.Point.parse).makeTwoWay(go.Point.stringify),
                    $(go.Shape,
                      {
                        name: "SHAPE",  // named so that changeColor can modify it
                        strokeWidth: 0,  // no border
                        fill: "lightgray",  // default fill color
                        portId: "",
                        // use the following property if you want users to draw new links
                        // interactively by dragging from the Shape, and re-enable the LinkingTool
                        // in the initialization of the Diagram
                        //cursor: "pointer",
                        fromSpot: go.Spot.AllSides, fromLinkable: true,
                        fromLinkableDuplicates: true, fromLinkableSelfNode: true,
                        toSpot: go.Spot.AllSides, toLinkable: true,
                        toLinkableDuplicates: true, toLinkableSelfNode: true
                      },
                      new go.Binding("fill", "color").makeTwoWay()),
                    $(go.TextBlock,
                      {
                        name: "TEXTBLOCK",  // named so that editText can start editing it
                        margin: 3,
                        // use the following property if you want users to interactively start
                        // editing the text by clicking on it or by F2 if the node is selected:
                        //editable: true,
                        overflow: go.TextBlock.OverflowEllipsis,
                        maxLines: 5
                      },
                      new go.Binding("text").makeTwoWay())
                  );
          
                // a selected node shows an Adornment that includes both a blue border
                // and a row of Buttons above the node
                myDiagram.nodeTemplate.selectionAdornmentTemplate =
                  $(go.Adornment, "Spot",
                    $(go.Panel, "Auto",
                      $(go.Shape, { stroke: "dodgerblue", strokeWidth: 2, fill: null }),
                      $(go.Placeholder)
                    ),
                    $(go.Panel, "Horizontal",
                      { alignment: go.Spot.Top, alignmentFocus: go.Spot.Bottom },
                      $("Button",
                        { click: editText },  // defined below, to support editing the text of the node
                        $(go.TextBlock, "t",
                          { font: "bold 10pt sans-serif", desiredSize: new go.Size(15, 15), textAlign: "center" })
                      ),
                      $("Button",
                        { click: changeColor, "_buttonFillOver": "transparent" },  // defined below, to support changing the color of the node
                        new go.Binding("ButtonBorder.fill", "color", nextColor),
                        $(go.Shape,
                          { fill: null, stroke: null, desiredSize: new go.Size(14, 14) })
                      ),
                      $("Button",
                        { // drawLink is defined below, to support interactively drawing new links
                          click: drawLink,  // click on Button and then click on target node
                          actionMove: drawLink  // drag from Button to the target node
                        },
                        $(go.Shape,
                          { geometryString: "M0 0 L8 0 8 12 14 12 M12 10 L14 12 12 14" })
                      ),
                      $("Button",
                        {
                          actionMove: dragNewNode,  // defined below, to support dragging from the button
                          _dragData: { text: "a Node", color: "lightgray" },  // node data to copy
                          click: clickNewNode  // defined below, to support a click on the button
                        },
                        $(go.Shape,
                          { geometryString: "M0 0 L3 0 3 10 6 10 x F1 M6 6 L14 6 14 14 6 14z", fill: "gray" })
                      )
                    )
                  );
          
                function editText(e, button) {
                  var node = button.part.adornedPart;
                  e.diagram.commandHandler.editTextBlock(node.findObject("TEXTBLOCK"));
                }
          
                // used by nextColor as the list of colors through which we rotate
                var myColors = ["lightgray", "lightblue", "lightgreen", "yellow", "orange", "pink"];
          
                // used by both the Button Binding and by the changeColor click function
                function nextColor(c) {
                  var idx = myColors.indexOf(c);
                  if (idx < 0) return "lightgray";
                  if (idx >= myColors.length - 1) idx = 0;
                  return myColors[idx + 1];
                }
          
                function changeColor(e, button) {
                  var node = button.part.adornedPart;
                  var shape = node.findObject("SHAPE");
                  if (shape === null) return;
                  node.diagram.startTransaction("Change color");
                  shape.fill = nextColor(shape.fill);
                  button["_buttonFillNormal"] = nextColor(shape.fill);  // update the button too
                  node.diagram.commitTransaction("Change color");
                }
          
                function drawLink(e, button) {
                  var node = button.part.adornedPart;
                  var tool = e.diagram.toolManager.linkingTool;
                  tool.startObject = node.port;
                  e.diagram.currentTool = tool;
                  tool.doActivate();
                }
          
                // used by both clickNewNode and dragNewNode to create a node and a link
                // from a given node to the new node
                function createNodeAndLink(data, fromnode) {
                  var diagram = fromnode.diagram;
                  var model = diagram.model;
                  var nodedata = model.copyNodeData(data);
                  model.addNodeData(nodedata);
                  var newnode = diagram.findNodeForData(nodedata);
                  var linkdata = model.copyLinkData({});
                  model.setFromKeyForLinkData(linkdata, model.getKeyForNodeData(fromnode.data));
                  model.setToKeyForLinkData(linkdata, model.getKeyForNodeData(newnode.data));
                  model.addLinkData(linkdata);
                  diagram.select(newnode);
                  return newnode;
                }
          
                // the Button.click event handler, called when the user clicks the "N" button
                function clickNewNode(e, button) {
                  var data = button._dragData;
                  if (!data) return;
                  e.diagram.startTransaction("Create Node and Link");
                  var fromnode = button.part.adornedPart;
                  var newnode = createNodeAndLink(button._dragData, fromnode);
                  newnode.location = new go.Point(fromnode.location.x + 200, fromnode.location.y);
                  e.diagram.commitTransaction("Create Node and Link");
                }
          
                // the Button.actionMove event handler, called when the user drags within the "N" button
                function dragNewNode(e, button) {
                  var tool = e.diagram.toolManager.draggingTool;
                  if (tool.isBeyondDragSize()) {
                    var data = button._dragData;
                    if (!data) return;
                    e.diagram.startTransaction("button drag");  // see doDeactivate, below
                    var newnode = createNodeAndLink(data, button.part.adornedPart);
                    newnode.location = e.diagram.lastInput.documentPoint;
                    // don't commitTransaction here, but in tool.doDeactivate, after drag operation finished
                    // set tool.currentPart to a selected movable Part and then activate the DraggingTool
                    tool.currentPart = newnode;
                    e.diagram.currentTool = tool;
                    tool.doActivate();
                  }
                }
          
                // using dragNewNode also requires modifying the standard DraggingTool so that it
                // only calls commitTransaction when dragNewNode started a "button drag" transaction;
                // do this by overriding DraggingTool.doDeactivate:
                var tool = myDiagram.toolManager.draggingTool;
                tool.doDeactivate = function() {
                  // commit "button drag" transaction, if it is ongoing; see dragNewNode, above
                  if (tool.diagram.undoManager.nestedTransactionNames.elt(0) === "button drag") {
                    tool.diagram.commitTransaction();
                  }
                  go.DraggingTool.prototype.doDeactivate.call(tool);  // call the base method
                };
          
                var num_ciclos=<?php echo $plan_estudio->programa->num_ciclos; ?>;
              
                  
                myDiagram.model = new go.GraphLinksModel(
                   cursos = <?php echo $cursos = App\Models\CursosPlanEstudios::select('id as key','nombre as text', 'color as color', 'posicion as location')
                          ->where('id_plan_estudio', $plan_estudio->id)->where('estado','!=','electivo/general')->orWhereNull('estado')->get();  ?>,

                   relaciones = <?php echo $cursos = App\Models\CursoRequisito::select('curso_requisitos.id_curso as to','curso_requisitos.id_requisito as from')
                         ->join('cursos_plan_estudios', 'curso_requisitos.id_curso', '=', 'cursos_plan_estudios.id')
                          ->where('cursos_plan_estudios.id_plan_estudio', $plan_estudio->id)->where('cursos_plan_estudios.estado','!=','electivo/general')->orWhereNull('cursos_plan_estudios.estado')->get();  ?>);
          
               

                document.getElementById("blobButton").addEventListener("click", makeBlob);
              }
              function myCallback(blob) {
      var url = window.URL.createObjectURL(blob);
      var filename = "myBlobFile.png";

      var a = document.createElement("a");
      a.style = "display: none";
      a.href = url;
      a.download = filename;

      // IE 11
      if (window.navigator.msSaveBlob !== undefined) {
        window.navigator.msSaveBlob(blob, filename);
        return;
      }

      document.body.appendChild(a);
      requestAnimationFrame(function() {
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
      });
    }

              function makeBlob() {
                
                var blob = myDiagram.makeImageData({ background: "white", returnType: "blob", callback: myCallback });
              }
              window.addEventListener('DOMContentLoaded', init);
            </script>
          
          <div id="sample">
            <button id="blobButton" class="btn btn-success">Descargar Malla</button> <br>
            <div class="mt-4" id="myDiagramDiv" style="border: solid 1px black; width:100%; height:1800px"></div>
           
          </div>
              </div>
              <!-- * * * * * * * * * * * * * -->
              <!--  End of GoJS sample code  -->
            </div>
            <!--hasta aqui-->
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Información</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                    <div class="col-sm-12" align="justify">
                        <p> Adjuntar un solo archivo en formato pdf</p>
                    </div>
              </div>       
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div> <br>
@endsection

@section('scripts')

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.config.height  = 400;
    CKEDITOR.replace( 'contenido' );
</script>
@endsection