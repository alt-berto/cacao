<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Type;
use App\Models\Sector;
use App\Models\UnidadProductiva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(  )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {
            //
            $this->data['sectores'] = Sector::where( 'isdeleted', false )->with( 'type' )->with( 'unidadproductiva' )->orderBy('unidad_productiva_id', 'asc')->get(  );
            // Title
            $this->data['title'] = 'Lista de Sectores - Cacao Oro';

            // Load Metas
            $this->data['metas'][] = [ 'name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no' ];
            $this->data['metas'][] = [ 'name' => 'generator', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'author', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'Description', 'content' => ''];
            //$this->data['metas'][] = [ 'name' => 'csrf-token', 'content' => '{{ csrf_token() }}' ];

            // Load External CSS Files
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin';

            // Load Internals CSS Files.
            $this->data['css']['internals'][] = 'bootstrap.min.css';
            $this->data['css']['internals'][] = 'app.css';
            $this->data['css']['internals'][] = 'style.css';

            // Load Internal Icons Files.
            $this->data['icons']['internals'][] = [ 'rel' => 'icon', 'size' => '', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '310x310', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '150x150', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '144x144', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '96x96', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '70x70', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '32x32', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '16x16', 'url' => 'logo-128x128-1.png' ];

            // Load Externals JS Files.

            // Load Internal JS Files.
            $this->data['js']['internals'][] = 'jquery-3.2.1.slim.min.js';
            $this->data['js']['internals'][] = 'popper.min.js';
            $this->data['js']['internals'][] = 'bootstrap.min.js';
            $this->data['js']['internals'][] = 'app.js';
            //
            return view( 'list_sectores' )->with( $this->data );
        }
        return abort( 404 );
    }

    public function active( Request $request ) {
        //
        $sectores = Sector::where( 'isdeleted', false )->with( 'unidadproductiva' )->orderBy('unidad_productiva_id', 'asc')->get(  );
        
        if ( $request->wantsJson(  ) ) {
            return $sectores->toJson(  );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {

            $this->data['unidades_productivas'] = UnidadProductiva::where( 'isdeleted', false )->where( 'isactive', true )->get(  );
            $this->data['types'] = Type::where( 'isdeleted', false )->where( 'isactive', true )->get(  );

            // Title
            $this->data['title'] = 'Crear Sector - Cacao Oro';

            // Load Metas
            $this->data['metas'][] = [ 'name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no' ];
            $this->data['metas'][] = [ 'name' => 'generator', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'author', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'Description', 'content' => ''];
            //$this->data['metas'][] = [ 'name' => 'csrf-token', 'content' => '{{ csrf_token() }}' ];

            // Load External CSS Files
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin';

            // Load Internals CSS Files.
            $this->data['css']['internals'][] = 'bootstrap.min.css';
            $this->data['css']['internals'][] = 'app.css';
            $this->data['css']['internals'][] = 'style.css';

            // Load Internal Icons Files.
            $this->data['icons']['internals'][] = [ 'rel' => 'icon', 'size' => '', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '310x310', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '150x150', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '144x144', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '96x96', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '70x70', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '32x32', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '16x16', 'url' => 'logo-128x128-1.png' ];

            // Load Externals JS Files.

            // Load Internal JS Files.
            $this->data['js']['internals'][] = 'jquery-3.2.1.slim.min.js';
            $this->data['js']['internals'][] = 'popper.min.js';
            $this->data['js']['internals'][] = 'bootstrap.min.js';
            $this->data['js']['internals'][] = 'app.js';
            //
            return view( 'create_sector' )->with( $this->data );
        }
        return abort( 404 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //
        $this->validate( request(  ), [ 
            'name' => 'required|max:255',
            'address' => 'max:255', 
            'lat' => 'max:255', 
            'long' => 'max:255', 
            'note' => 'max:255',   
        ] );
        //
        $current_timestamp = date('Y-m-d H:i:s');
        $in_sector = Sector::create( [ 
            'unidad_productiva_id' => $request->unidad_productiva_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'address' => $request->address,
            'size' => $request->size,
            'lat' => $request->lat,
            'long' => $request->long,
            'note' => $request->note, 
            'isactive' => $request->isactive,
            'created_at' => $current_timestamp
          ] );        
       
                      
        return redirect(  )->back(  )->with( 'success', 'Sector agregado correctamente!.' ); 
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {
            //
            $this->data['unidades_productivas'] = UnidadProductiva::where( 'isdeleted', false )->where( 'isactive', true )->get(  );
            $this->data['types'] = Type::where( 'isdeleted', false )->where( 'isactive', true )->get(  );
            $this->data['sector'] = Sector::where( 'id', $id )->first(  );

            // Title
            $this->data['title'] = 'Editar Sector - Cacao Oro';

            // Load Metas
            $this->data['metas'][] = [ 'name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no' ];
            $this->data['metas'][] = [ 'name' => 'generator', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'author', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'Description', 'content' => ''];
            //$this->data['metas'][] = [ 'name' => 'csrf-token', 'content' => '{{ csrf_token() }}' ];

            // Load External CSS Files
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin';

            // Load Internals CSS Files.
            $this->data['css']['internals'][] = 'bootstrap.min.css';
            $this->data['css']['internals'][] = 'app.css';
            $this->data['css']['internals'][] = 'style.css';

            // Load Internal Icons Files.
            $this->data['icons']['internals'][] = [ 'rel' => 'icon', 'size' => '', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '310x310', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '150x150', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '144x144', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '96x96', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '70x70', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '32x32', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '16x16', 'url' => 'logo-128x128-1.png' ];

            // Load Externals JS Files.

            // Load Internal JS Files.
            $this->data['js']['internals'][] = 'jquery-3.2.1.slim.min.js';
            $this->data['js']['internals'][] = 'popper.min.js';
            $this->data['js']['internals'][] = 'bootstrap.min.js';
            $this->data['js']['internals'][] = 'app.js';
            //
            return view( 'edit_sector' )->with( $this->data );
        }
        return abort( 404 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        //
        $this->validate( request(  ), [ 
            'name' => 'required|max:255',
            'address' => 'max:255', 
            'lat' => 'max:255', 
            'long' => 'max:255', 
            'note' => 'max:255',            
        ] );
        //
        $current_timestamp = date('Y-m-d H:i:s');
        $in_sector = Sector::where( 'id', $id )->update( [
            'unidad_productiva_id' => $request->unidad_productiva_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'address' => $request->address,
            'size' => $request->size,
            'lat' => $request->lat,
            'long' => $request->long,
            'note' => $request->note,
            'isactive' => $request->isactive,
            'updated_at' => $current_timestamp
        ] );            
        //
                                  
        return redirect(  )->back(  )->with( 'success', 'Se ha modificado el sector correctamente' ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id )
    {
        //
        $sector = Sector::find( $id );
        $name = $sector->name;
        $sector->update( [ 'isdeleted' => true ] );
        return redirect(  )->back(  )->with( 'success', 'Se ha eliminado correctamente el sector: '.$name ); 
    }
}
