@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Profil Warga  
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
              </button>
        
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                        <label class="form-label"> Upload KTP</label>
                        <input type="file" name="upload_ktp" id="upload_ktp">
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                Lihat KK
            </button>
        
              <!-- Modal -->
              <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                        <label class="form-label"> Upload KTP</label>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, maxime!</p>
                        <input type="file" name="upload_ktp" id="upload_ktp">
                        </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <a class="btn btn-primary" href="#" role="button">Edit Profil</a>
            <a class="btn btn-primary" href="#" role="button">Ganti RT</a>
            <table class="table mt-4">
                <tbody>
                  <tr>
                    <th scope="row">Nama Lengkap</th>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">Nomor KTP</th>
                    <td>Jacob</td>
                   
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td colspan="2">Larry the Bird</td>
                   
                  </tr>
                  <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td colspan="2">Larry the Bird</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Usia</th>
                    <td colspan="2">Larry the Bird</td>
                   
                  </tr>
                  <tr>
                    <th scope="row">Agama</th>
                    <td colspan="2">Larry the Bird</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Pendidikan</th>
                    <td colspan="2">Larry the Bird</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Pekerjaan</th>
                    <td colspan="2">Larry the Bird</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Nomor Rumah</th>
                    <td colspan="2">Larry the Bird</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Nomor Kontak</th>
                    <td colspan="2">Larry the Bird</td>
                    
                  </tr>
                </tbody>
              </table>
        </div>
      </div>

    

</div>

@endsection
    