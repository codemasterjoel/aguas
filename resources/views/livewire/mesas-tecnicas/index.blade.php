<div class="row px-2">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5 class="text-info text-gradient font-weight-bold ms-lg-0 ms-3 "><b>MESAS TÉCNICAS DE AGUA</b></h5>
        </div>
        <div class="d-flex flex-row justify-content-between px-4">
            <input wire:model.live="search" type="text" placeholder="Filtrar por Nombre" class="w-30 form-control px-4 py-2 border border-solid rounded-lg outline-2 font-bold">
            {{-- <button type="button" class="btn bg-gradient-primary btn-sm mb-0 font-bold" wire:click="export()">EXPORTAR</button> --}}
            <button type="button" class="btn bg-gradient-primary btn-sm mb-0 font-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">NUEVO REGISTRO</button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 table-responsive">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">estado</th>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">municipio</th>
                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">PARROQUIA</th>
                  <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">NOMBRE</th>
                  <th class="text-center text-secondary font-weight-bolder">ACCIONES</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($consejos as $item)
                <tr>
                  <td><div class="d-flex px-2 py-1">{{ $loop->iteration }}</div></td>
                  <td><div class="d-flex px-2 py-1"><p class="text-xs font-weight-bold mb-0">{{ $item->comuna->parroquia->municipio->estado->nombre }}</p></div></td>
                  <td><div class="d-flex px-2 py-1"><p class="text-xs font-weight-bold mb-0">{{ $item->comuna->parroquia->municipio->nombre }}</p></div></td>
                  <td><p class="text-xs font-weight-bold mb-0">{{ $item->comuna->parroquia->nombre }}</p></td>
                  {{-- <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success">Online</span></td> --}}
                  <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item->nombre }}</span></td>
                  <td class="text-center"><a href="" class=" font-weight-bold " data-toggle="tooltip" data-original-title="Edit user"><span class="badge badge-sm bg-gradient-info">VER</span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="card-footer">
                {{$consejos->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center">REGISTRAR NUEVA MESA TECNICA DE AGUA</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-dark font-bold">Estado</span>
                                            <select class="w-full form-control pl-3 border border-solid outline-2 font-bold rounded-r-lg " wire:model.live="estadoId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $estados as $estado )
                                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('estadoId')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            @if (!is_null($municipios)) {{-- campo municipio --}}
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-dark font-bold">Municipio</span>
                                                <select class="w-full form-control pl-3 border font-bold border-solid rounded-r-lg outline-2 border-slate-900" wire:model.live="municipioId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $municipios as $municipio )
                                                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('municipioId') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-dark font-bold">Parroquia</span>
                                                <select class="w-full form-control pl-3 border border-solid font-bold border-slate-900 text-slate-900 rounded-r-lg outline-2" wire:model.live="parroquiaId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $parroquias as $parroquia )
                                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('parroquiaId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            @if (!is_null($comunas)) {{-- campo Parroquia --}}
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-dark font-bold">Comuna o Circuito Comunal</span>
                                                <select class="flex-auto form-control w-[1px] pl-3 border border-solid rounded-r-lg border-slate-900 text-slate-900 outline-2 font-bold" wire:model="comunaId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $comunas as $comuna )
                                                    <option value="{{ $comuna->id }}">{{ $comuna->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('comunaId') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo Direccion --}}
                                    <div class="w-full rounded-lg">
                                      <div class="flex">
                                        <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-dark font-bold">Mesa Técnica</span>
                                        <input wire:model="mesa_tecnica" type="text" class="w-full form-control pl-3 border border-solid rounded-r-lg font-bold outline-2 border-slate-900 text-slate-900" onkeyup="this.value = this.value.toUpperCase();"/>
                                      </div>
                                      @error('mesa_tecnica') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class=" form-control block text-white w-32 py-2 bg-gradient-info mx-auto " wire:click.prevent="guardar()"><b>GUARDAR</b></button>
                    <button type="button" class="w-32 form-control py-2 text-white bg-gradient-danger mx-auto mb-2" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal"><b>SALIR</b></button>
                </div>
            </div>
        </div>
    </div>
  </div>
