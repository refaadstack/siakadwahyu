<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">SIAKAD</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            
          </ul>
          <li class="nav-item dropdown">
            <a href="#" class=" nav-link has-dropdown"><i class="fas fa-store"></i><span>Master Data</span></a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a class="nav-link" href="{{ route('ganti-password') }}">Ganti Password</a></li>
              @if (Auth::user()->role == 'admin')
                  <li class="nav-item"><a class="nav-link" href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('kelas.index') }}">Data Kelas</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('semester.index') }}">Data Semester</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('jurusan.index') }}">Data Jurusan</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('mapel.index') }}">Data Mata Pelajaran</a></li> 
                  <li class="nav-item"><a class="nav-link" href="{{ route('jadwal.index') }}">Data Jadwal</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('jam.index') }}">Data Jam</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a></li>

              @elseif (Auth::user()->role == 'guru')
                  <li class="nav-item"><a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('guru.profile') }}">Profil Saya</a></li>
              @else
                  <li class="nav-item"><a class="nav-link" href="{{ route('siswa.profile') }}">Profil Saya</a></li>
              @endif
                
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class=" nav-link has-dropdown"><i class="fas fa-money-check-alt"></i><span>Laporan</span></a>
            <ul class="dropdown-menu">
              
            </ul>
          </li>
        </li>
      </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-user"></i> {{ Auth::user()->role }}
        </a>
      </div>
  </aside>
</div>