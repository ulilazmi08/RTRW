@extends('layouts.main')
@section('container')

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card" >
            <div id="chartGender" style="height: 300px; width: 100%;" class="card-body">
                <table class="table mt-4">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="card" >
            <div id="chartPendidikan" style="height: 300px; width: 100%;" class="card-body">
                <table class="table mt-4">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="card" >
            <div id="chartAgama" style="height: 300px; width: 100%;" class="card-body">
                <table class="table mt-4">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-xl-4 col-lg-5">
        <div class="card" >
            <div id="chartPekerjaan" style="height: 300px; width: 100%;" class="card-body">
                <table class="table mt-4">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-xl-4 col-lg-5">
        <div class="card" >
            <div id="chartUmur" style="height: 300px; width: 100%;" class="card-body">
                <table class="table mt-4">
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- Script Chart --}}
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">

    window.onload = function () {
        var pria = <?php echo $pria ?>;
        var perempuan = <?php echo $perempuan ?>;
        var chart = new CanvasJS.Chart("chartGender", {
            title:{
                text: "Berdasarkan Jenis Kelamin"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    { label: "Laki Laki",  y: pria  },
                    { label: "Perempuan", y: perempuan  },
                   
                ]
            }
            ]
        });
        chart.render();


        var sd = <?php echo $sd ?>;
        var smp = <?php echo $smp ?>;
        var sma = <?php echo $sma ?>;
        var s1 = <?php echo $s1 ?>;
        var s2 = <?php echo $s2 ?>;
        var s3 = <?php echo $s3 ?>;

        var chart = new CanvasJS.Chart("chartPendidikan", {
            title:{
                text: "Berdasarkan Pendidikan"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    { label: "SD",  y: sd  },
                    { label: "SMP", y: smp  },
                    { label: "SMA", y: sma  },
                    { label: "S1", y: s1  },
                    { label: "S2", y: s2  },
                    { label: "S3", y: s3  },

                   
                ]
            }
            ]
        });
        chart.render();

        var islam = <?php echo $islam ?>;
        var hindu = <?php echo $hindu ?>;
        var budha = <?php echo $budha ?>;
        var protestan = <?php echo $protestan ?>;
        var katolik = <?php echo $katolik ?>;
        var konghucu = <?php echo $konghucu ?>;

        var chart = new CanvasJS.Chart("chartAgama", {
            title:{
                text: "Berdasarkan Agama"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    { label: "islam",  y: islam  },
                    { label: "hindu", y: hindu  },
                    { label: "protestan", y: protestan  },
                    { label: "katolik", y: katolik  },
                    { label: "budha", y: budha  },
                    { label: "konghucu", y: konghucu  },

                   
                ]
            }
            ]
        });
        chart.render();

        var pns = <?php echo $pns ?>;
        var militer = <?php echo $militer ?>;
        var polisi = <?php echo $polisi ?>;
        var dokter = <?php echo $dokter ?>;
        var akademisi = <?php echo $akademisi ?>;
        var karyawanswasta = <?php echo $karyawanswasta ?>;
        var wirausaha = <?php echo $wirausaha ?>;
        var chart = new CanvasJS.Chart("chartPekerjaan", {
            title:{
                text: "Berdasarkan Pekerjaan"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    { label: "pns",  y: pns  },
                    { label: "militer", y: militer  },
                    { label: "polisi", y: polisi  },
                    { label: "dokter", y: dokter  },
                    { label: "akademisi", y: akademisi  },
                    { label: "karyawanswasta", y: karyawanswasta  },
                    { label: "wirausaha", y: wirausaha  },


                   
                ]
            }
            ]
        });
        chart.render();

        var umur05 = <?php echo $umur05 ?>;
        var umur611 = <?php echo $umur611 ?>;
        var umur1217 = <?php echo $umur1217 ?>;
        var umur1825 = <?php echo $umur1825 ?>;
        var umur2635 = <?php echo $umur2635 ?>;
        var umur3649 = <?php echo $umur3649 ?>;
        var umur50 = <?php echo $umur50 ?>;


        var chart = new CanvasJS.Chart("chartUmur", {
            title:{
                text: "Umur"              
            },
            data: [              
            {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                    { label: "0-5",  y: umur05  },
                    { label: "6-11", y: umur611  },
                    { label: "12-17", y: umur1217  },
                    { label: "18-25", y: umur1825  },
                    { label: "26-35", y: umur2635  },
                    { label: "36-49", y: umur3649  },
                    { label: "50", y: umur50  },


                   
                ]
            }
            ]
        });
        chart.render();
    }
    </script>

@endsection
    