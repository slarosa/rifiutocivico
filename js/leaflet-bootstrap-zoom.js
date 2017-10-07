if (!L) {
    throw new Error('Leaflet is not defined');
} else {
    L.Control.BootstrapZoom = L.Control.Zoom = L.Control.Zoom.extend({
        options: {
            position: 'topleft',
            zoomInText: '<span class="glyphicon glyphicon-zoom-in"/>',
            zoomInTitle: 'Zoom in',
            zoomOutText: '<span class="glyphicon glyphicon-zoom-out"/>',
            zoomOutTitle: 'Zoom out'
        },

        onAdd: function (map) {
            const zoomName = 'leaflet-bootstrap-zoom';
            const container = L.DomUtil.create('div', `${zoomName} btn-group-vertical`);
            const options = this.options;


            this._zoomInButton = this._createButton(
                options.zoomInText, options.zoomInTitle,
                `${zoomName}-in btn btn btn-default`,
                container, this._zoomIn
            );
            this._zoomOutButton = this._createButton(
                options.zoomOutText, options.zoomOutTitle,
                `${zoomName}-out btn btn btn-default`,
                container, this._zoomOut
            );

            this._updateDisabled();
            map.on('zoomend zoomlevelschange', this._updateDisabled, this);

            return container;
        },

        _createButton: function (html, title, className, container, fn) {
            const link = L.DomUtil.create('div', className, container);
            link.innerHTML = html;
            link.href = '#';
            link.title = title;

            L.DomEvent
                .on(link, 'mousedown dblclick', L.DomEvent.stopPropagation)
                .on(link, 'click', L.DomEvent.stop)
                .on(link, 'click', fn, this)
                .on(link, 'click', this._refocusOnMap, this);

            return link;
        },

        _updateDisabled: function () {
            const map = this._map;
            const className = 'disabled';

            L.DomUtil.removeClass(this._zoomInButton, className);
            L.DomUtil.removeClass(this._zoomOutButton, className);

            if (this._disabled || map._zoom === map.getMinZoom()) {
                L.DomUtil.addClass(this._zoomOutButton, className);
            }
            if (this._disabled || map._zoom === map.getMaxZoom()) {
                L.DomUtil.addClass(this._zoomInButton, className);
            }
        }
    });
}
