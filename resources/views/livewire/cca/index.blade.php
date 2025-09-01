<div class="row px-2">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5 class="text-info text-gradient font-weight-bold ms-lg-0 ms-3 "><b>CONSEJOS COMUNITARIOS DE AGUA</b></h5>
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
                @foreach ($comunas as $item)
                <tr>
                  <td><div class="d-flex px-2 py-1">{{ $loop->iteration }}</div></td>
                  <td><div class="d-flex px-2 py-1"><p class="text-xs font-weight-bold mb-0">{{ $item->parroquia->municipio->estado->nombre }}</p></div></td>
                  <td><div class="d-flex px-2 py-1"><p class="text-xs font-weight-bold mb-0">{{ $item->parroquia->municipio->nombre }}</p></div></td>
                  <td><p class="text-xs font-weight-bold mb-0">{{ $item->parroquia->nombre }}</p></td>
                  {{-- <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success">Online</span></td> --}}
                  <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">{{ $item->nombre }}</span></td>
                  <td class="text-center"><a href="" class=" font-weight-bold " data-toggle="tooltip" data-original-title="Edit user"><span class="badge badge-sm bg-gradient-info">VER</span></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="card-footer">
                {{$comunas->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
