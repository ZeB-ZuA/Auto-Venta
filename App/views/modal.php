<?php
// modal.php
?>

<!-- El Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modal-title">Información del Proveedor</h2>
        <p id="modal-info">Aquí va la información del proveedor.</p>
    </div>
</div>

<script>
   
    var modal = document.getElementById("myModal");

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    document.querySelectorAll('.card-suppliers').forEach(function(card) {
        card.onclick = function() {
            var supplierId = this.getAttribute('data-supplier');
            var supplierInfo = getSupplierInfo(supplierId);
            document.getElementById('modal-title').innerText = supplierInfo.title;
            document.getElementById('modal-info').innerText = supplierInfo.info;
            modal.style.display = "block";
        }
    });

    function getSupplierInfo(id) {
        var info = {
            1: { title: 'FERRAI', info: 'Ferrari es una icónica marca italiana de automóviles deportivos de lujo, fundada por Enzo Ferrari en 1939. Conocida por su distintivo color rojo y el emblema del caballo encabritado, Ferrari se destaca por sus vehículos de alto rendimiento y su éxito en el automovilismo, especialmente en la Fórmula 1.' },
            2: { title: 'HONDA', info: 'Honda es una reconocida marca japonesa fundada en 1948, famosa por su producción de automóviles, motocicletas y equipos de energía. Con una reputación de fiabilidad, innovación y eficiencia, Honda se ha consolidado como una de las principales marcas a nivel mundial, ofreciendo una amplia gama de vehículos desde compactos hasta SUVs.' },
            3: { title: 'MERCEDES-BENZ', info: 'Mercedes-Benz, una marca alemana establecida en 1926, es sinónimo de lujo, calidad y tecnología avanzada. Con una amplia gama de vehículos que incluyen sedanes, SUVs y deportivos, Mercedes-Benz se destaca por su elegancia, confort y su compromiso con la innovación en seguridad y rendimiento.BMW' },
            4: { title: 'BMW', info: 'BMW, abreviatura de Bayerische Motoren Werke, es una prestigiosa marca alemana fundada en 1916, conocida por sus automóviles y motocicletas de lujo. Con una filosofía centrada en el placer de conducir, BMW combina la ingeniería de precisión con un diseño elegante y deportivo, destacándose por sus vehículos de alto rendimiento y tecnología avanzada.' },
            5: { title: 'TOYOTA', info: 'Toyota, una marca japonesa establecida en 1937, es uno de los mayores fabricantes de automóviles del mundo. Reconocida por su fiabilidad, durabilidad y eficiencia, Toyota ofrece una amplia gama de vehículos que incluyen sedanes, SUVs y híbridos. Innovadora en tecnología ecológica, Toyota es pionera en la producción de automóviles híbridos con su popular modelo Prius.' }
        };
        return info[id];
    }
</script>
