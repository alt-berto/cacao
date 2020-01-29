<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Lote;
use App\Models\Lote_UnidadProductiva;
use Illuminate\Http\Request;

class LoteController extends Controller
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

            // Title
            $this->data['title'] = 'Lista de Lotes - Cacao Oro';

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
            return view( 'list_lotes' )->with( $this->data );
        }
        return abort( 404 );
    }

    public function active( Request $request ) {
        //
        $lotes = Lote::where( 'isdeleted', false )->with( 'lote_unidadproductivas.sector.type' )->with( 'lote_unidadproductivas.sector.unidadproductiva' )->orderBy('consecutive', 'desc')->get(  );
        
        if ( $request->wantsJson(  ) ) {
            return $lotes->toJson(  );
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

            // Title
            $this->data['title'] = 'Crear Lote - Cacao Oro';

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
            return view( 'create_lote' )->with( $this->data );
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
        if ( Auth::check(  ) ) {
            //
            $current_timestamp = date('Y-m-d H:i:s');
            $in_lote = Lote::create( [
                'consecutive' => $request->consecutive,
                'name' => $request->name,
                'date' => $request->date,
                'status' => $request->status,
                'note' => $request->note,
                'isactive' => true,
                'created_at' => $current_timestamp
            ] );
            if ( $in_lote ) {
                //
                foreach( $request->unidades_productivas as $value ) {
                    
                    $in_sectores = Lote_UnidadProductiva::create( [
                        'lote_id' => $in_lote->id,
                        'sector_id' => $value['sector_id'],
                        'measure' => $value['measure'],
                        'amount' => $value['amount'],
                        'note' => $value['note'],
                    ] );
                    if ( !$in_sectores ) {
                        break;
                    return 'error';
                    }
                }                                
                return 'done';
            } else {
                return 'error';
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id )
    {
        //
        $lote = Lote::where( 'isdeleted', false )->with( 'lote_unidadproductivas.sector.type' )->with( 'lote_unidadproductivas.sector.unidadproductiva.sectores' )->orderBy('consecutive', 'desc')->where( 'id', $id )->first(  );

		if ( $request->wantsJson(  ) ) {
			return $lote->toJson(  );
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {
            //
            //$this->data['unidades_productivas'] = UnidadProductiva::where( 'isdeleted', false )->where( 'isactive', true )->get(  );
            $this->data['id'] = $id;

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
            return view( 'edit_lote' )->with( $this->data );
        }
        return abort( 404 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        //
        if ( Auth::check(  ) ) {
            //
            $current_timestamp = date('Y-m-d H:i:s');
            $sectores = Lote_UnidadProductiva::where( 'lote_id', $id )->get(  );
            $in_lote = Lote::where( 'id', $id )->update( [
                'consecutive' => $request->lote['consecutive'],
                'name' => $request->lote['name'],
                'date' => $request->lote['date'],
                'status' => $request->lote['status'],
                'note' => $request->lote['note'],
                'isactive' => true,
                'updated_at' => $current_timestamp
            ] );
            if ( $in_lote ) {
                //
                foreach( $request->lote['lote_unidadproductivas'] as $value ) {
                    if ( $value['id'] == null || $value['id'] == '' ) {
                        $in_sectores = Lote_UnidadProductiva::create( [
                            'lote_id' => $id,
                            'sector_id' => $value['sector_id'],
                            'measure' => $value['measure'],
                            'amount' => $value['amount'],
                            'note' => $value['note'],
                        ] );
                    } else {
                        $in_sectores = Lote_UnidadProductiva::where( 'id', $value['id'] )->update( [
                            'lote_id' => $id,
                            'sector_id' => $value['sector_id'],
                            'measure' => $value['measure'],
                            'amount' => $value['amount'],
                            'note' => $value['note'],
                        ] );
                        }
                }
                //
                foreach ( $sectores as $sector ) {                
                    $delete = true;
                    foreach( $request->lote['lote_unidadproductivas'] as $value ) {
                        if ( $value['id'] == $sector->id ) {
                            $delete = false;
                        }
                    }
                    if ( $delete == true ) {
                        $temp = Lote_UnidadProductiva::find( $value['id'] );
                        $temp->update( [ 'isdeleted' => true ] );
                    }
                }
                //
                return 'done';
            } else {
                return 'error';
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lote  $lote
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id )
    {
        //
        $lote = Lote::find( $id );
        $name = $lote->consecutive;
        $lote->update( [ 'isdeleted' => true ] );
        return 'done';
    }
}
