<div class="content-padder content-background">
    <div class="uk-section-small uk-section-default header">
        <div class="uk-container uk-container-large">
            <h2><span class="ion-speedometer"></span> Beranda</h2>
            <p>
                Selamat Datang, <?= $this->session->userdata('nama') ?>, <?= $judul ?>
            </p>
        </div>
    </div>
    <div class="uk-section-small">
        <div class="uk-container uk-container-large">
            <div id="mapid"></div>
        </div>
    </div>


    <script type="text/javascript">
        var data = [
            <?php
            foreach ($geo as $key => $r) { ?> {
                    "lokasi": [<?= $r->latitude ?>, <?= $r->longitude ?>],
                    "kecamatan": "<?= $r->kecamatan ?>",
                    "keterangan": "<?= $r->keterangan ?>",
                    "tempat": "<?= $r->lokasi ?>",
                    "kategori": "<?= $r->kategori ?>"
                },
            <?php } ?>
        ];

        var map = new L.Map('mapid', {
            zoom: 10,
            center: new L.latLng(5.224544745865297, 96.717395411689)
        });
        map.addLayer(new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicmV6ZDIyIiwiYSI6ImNrY3cxNjRmMTA5bHYyeHFvN3RtbHZ4cjkifQ.ArpQweED_QnorvXA_LBF6g', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }));

        var markersLayer = new L.LayerGroup();
        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 25,
            marker: false
        });

        map.addControl(new L.Control.Search({

            layer: markersLayer,
            initial: false,
            collapsed: true,
        }));

        var angin = L.icon({
            iconUrl: '<?= base_url('public/icon/angin.png') ?>',
            iconSize: [30, 30]
        });

        var banjir = L.icon({
            iconUrl: '<?= base_url('public/icon/banjir.png') ?>',
            iconSize: [30, 30]
        });

        var gempabumi = L.icon({
            iconUrl: '<?= base_url('public/icon/gempabumi.png') ?>',
            iconSize: [30, 30]
        });

        var kebakaran = L.icon({
            iconUrl: '<?= base_url('public/icon/kebakaran.png') ?>',
            iconSize: [30, 30]
        });

        var kecelakaan = L.icon({
            iconUrl: '<?= base_url('public/icon/kecelakaan.png') ?>',
            iconSize: [30, 30]
        });

        var longsor = L.icon({
            iconUrl: '<?= base_url('public/icon/longsor.png') ?>',
            iconSize: [30, 30]
        });

        var pohontumbang = L.icon({
            iconUrl: '<?= base_url('public/icon/pohontumbang.png') ?>',
            iconSize: [30, 30]
        });

        var tsunami = L.icon({
            iconUrl: '<?= base_url('public/icon/tsunami.png') ?>',
            iconSize: [30, 30]
        });

        var icons = "";
        for (i in data) {
            var kecamatan = data[i].kecamatan;
            var lokasi = data[i].lokasi;
            var tempat = data[i].tempat;
            var keterangan = data[i].keterangan;
            var kategori = data[i].kategori;

            if (kategori == "Toko Besar Kopi") {
                icons = banjir;
            } else if (kategori == "Cabang Mall") {
                icons = banjir;
            } else if (kategori == "Kebun kopi") {
                icons = longsor;

            } else if (kategori == "Retail Cabang Kopi") {
                icons = pohontumbang;
            }

            var marker = new L.Marker(new L.latLng(lokasi), {
                title: kecamatan,
                icon: icons
            });
            marker.bindPopup('<b>Kecamatan: ' + kecamatan + ' <br> Lokasi: ' + tempat + '<br> Keterangan: ' + keterangan + '</b>');
            markersLayer.addLayer(marker);
        }
    </script>