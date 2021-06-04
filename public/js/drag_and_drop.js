(function() {
    var id_ = 'columns-dragEnd';
    var cols_ = document.querySelectorAll('#' + id_ + ' .column');

    this.handleDragStart = function(e) {
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML); 
        this.style.opacity = '0.4';
    };

    this.handleDragOver = function(e) {
        if (e.preventDefault) {
            e.preventDefault(); 
        }
        e.dataTransfer.dropEffect = 'move';
        return false;
    };

    this.handleDragEnter = function(e) {
        this.addClassName('over');
    };

    this.handleDragLeave = function(e) {
        this.removeClassName('over');
    };

    this.handleDragEnd = function(e) {
        [].forEach.call(cols_, function (col) {
            col.removeClassName('over');
        });
        this.style.opacity = '1';
    };

    [].forEach.call(cols_, function (col) {
        col.setAttribute('draggable', 'true');
        col.addEventListener('dragstart', this.handleDragStart, false);
        col.addEventListener('dragenter', this.handleDragEnter, false);
        col.addEventListener('dragover', this.handleDragOver, false);
        col.addEventListener('dragleave', this.handleDragLeave, false);
        col.addEventListener('dragend', this.handleDragEnd, false);
    });

})();

(function() {
    var id_ = 'columns-full';
    var cols_ = document.querySelectorAll('#' + id_ + ' .column');
    var dragSrcEl_ = null;

    this.handleDragStart = function(e) {
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
        dragSrcEl_ = this;
        this.addClassName('moving');
    };

    this.handleDrop = function(e) {
        if (e.stopPropagation) {
            e.stopPropagation(); 
        }
        if (dragSrcEl_ != this) {
            dragSrcEl_.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
            var count = this.querySelector('.count');
            var newCount = parseInt(count.getAttribute('data-col-moves')) + 1;
            count.setAttribute('data-col-moves', newCount);
            count.textContent = 'moves: ' + newCount;
        }
        return false;
    };

    [].forEach.call(cols_, function (col) {
        col.setAttribute('draggable', 'true');  
        col.addEventListener('dragstart', this.handleDragStart, false);
        col.addEventListener('dragenter', this.handleDragEnter, false);
        col.addEventListener('dragover', this.handleDragOver, false);
        col.addEventListener('dragleave', this.handleDragLeave, false);
        col.addEventListener('drop', this.handleDrop, false);
        col.addEventListener('dragend', this.handleDragEnd, false);
    });
})();