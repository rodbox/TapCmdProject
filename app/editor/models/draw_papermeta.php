<?php
    $d = [
    'Item' => [
        'extends' => '',
        'properties' => [
            ['name' => 'id', 'type' => 'Number'],
            ['name' => 'className', 'type' => 'String'],
            ['name' => 'name', 'type' => 'String'],
            ['name' => 'style', 'type' => 'Style'],
            ['name' => 'visible', 'type' => 'Boolean'],
            ['name' => 'blendMode', 'type' => 'String'],
            ['name' => 'opacity', 'type' => 'Number'],
            ['name' => 'selected', 'type' => 'Boolean'],
            ['name' => 'clipMask', 'type' => 'Boolean'],
            ['name' => 'data', 'type' => 'Object'],

        ],
        'position' => [
            ['name' => 'position', 'type' => 'Point'],
            ['name' => 'pivot', 'type' => 'Point'],
            ['name' => 'bounds', 'type' => 'Rectangle'],
            ['name' => 'strokeBounds', 'type' => 'Rectangle'],
            ['name' => 'handleBounds', 'type' => 'Rectangle'],
            ['name' => 'rotation', 'type' => 'Number'],
            ['name' => 'scaling', 'type' => 'Point'],
            ['name' => 'matrix', 'type' => 'Matrix'],
            ['name' => 'globalMatrix', 'type' => 'Matrix'],
            ['name' => 'applyMatrix', 'type' => 'Boolean']
        ],
        'hierarchy' => [
            ['name' => 'project', 'type' => 'Project'],
            ['name' => 'view', 'type' => 'View'],
            ['name' => 'layer', 'type' => 'Layer'],
            ['name' => 'parent', 'type' => 'Item'],
            ['name' => 'children', 'type' => 'Items'],
            ['name' => 'firstChild', 'type' => 'Item'],
            ['name' => 'lastChild', 'type' => 'Item'],
            ['name' => 'nextSibling', 'type' => 'Item'],
            ['name' => 'previousSibling', 'type' => 'Item'],
            ['name' => 'index', 'type' => 'Number']
        ],
        'stroke' => [
            ['name' => 'strokeColor', 'type' => 'Color'],
            ['name' => 'strokeWidth', 'type' => 'Number'],
            ['name' => 'strokeCap', 'type' => 'String'],
            ['name' => 'strokeJoin', 'type' => 'String'],
            ['name' => 'dashOffset', 'type' => 'Number'],
            ['name' => 'strokeScaling', 'type' => 'Boolean'],
            ['name' => 'dashArray', 'type' => 'Array'],
            ['name' => 'miterLimit', 'type' => 'Number']
        ],
        'fill' => [
            ['name' => 'fillColor', 'type' => 'Color'],
            ['name' => 'fillRule', 'type' => 'String']
        ],
        'shadow' => [
            ['name' => 'shadowColor', 'type' => 'Color'],
            ['name' => 'shadowBlur', 'type' => 'Number'],
            ['name' => 'shadowOffset', 'type' => 'Point']
        ],
        'selection' => [
            ['name' => 'selectedColor', 'type' => 'Color']
        ],
        'operation' => [
            ['name' => 'addChild', 'type' => 'func','req' => ['item']],
            ['name' => 'insertChild', 'type' => 'func','req' => ['index', 'item']],
            ['name' => 'addChildren', 'type' => 'func','req' => ['items']],
            ['name' => 'insertChildren', 'type' => 'func','req' => ['index', 'items']],
            ['name' => 'insertAbove', 'type' => 'func','req' => ['item']],
            ['name' => 'insertBelow', 'type' => 'func','req' => ['item']],
            ['name' => 'sendToBack', 'type' => 'func'],
            ['name' => 'bringToFront', 'type' => 'func'],
            ['name' => 'appendTop', 'type' => 'func','req' => ['item']],
            ['name' => 'appendBottom', 'type' => 'func','req' => ['item']],
            ['name' => 'moveAbove', 'type' => 'func','req' => ['item']],
            ['name' => 'moveBelow', 'type' => 'func','req' => ['item']],
            ['name' => 'copyTo', 'type' => 'func','req' => ['owner']],
            ['name' => 'reduce', 'type' => 'func','req' => ['options']],
            ['name' => 'remove', 'type' => 'func'],
            ['name' => 'replaceWith', 'type' => 'func','req' => ['item']],
            ['name' => 'removeChildren', 'type' => 'func'],
            ['name' => 'removeChildren', 'type' => 'func','req' => ['start'], 'opt' => ['end']],
            ['name' => 'reverseChildren', 'type' => 'func']
        ],
        'empty' => [
            ['name' => 'isEmpty','type' => 'func']
        ],
        'style' => [
            ['name' => 'hasFill','type' => 'func'],
            ['name' => 'hasStroke','type' => 'func'],
            ['name' => 'hasShadow','type' => 'func']
        ],
        'transform' => [
            ['name' => 'translate','type' => 'func', 'req' => ['delta']],
            ['name' => 'rotate','type' => 'func', 'req' => ['angle'], 'opt' => ['center']],
            ['name' => 'scale','type' => 'func', 'req' => ['scale'], 'opt' => ['center']],
            ['name' => 'scale','type' => 'func', 'req' => ['hor', 'ver'], 'opt' => ['center']],
            ['name' => 'shear','type' => 'func', 'req' => ['shear'], 'opt' => ['center']],
            ['name' => 'shear','type' => 'func', 'req' => ['hor', 'ver'], 'opt' => ['center']],
            ['name' => 'skew','type' => 'func', 'req' => ['skew'], 'opt' => ['center']],
            ['name' => 'skew','type' => 'func', 'req' => ['hor, ver'], 'opt' => ['center']],
            ['name' => 'transform','type' => 'func', 'req' => ['matrix']],
            ['name' => 'globalToLocal','type' => 'func', 'req' => ['point']],
            ['name' => 'localToGlobal','type' => 'func', 'req' => ['point']],
            ['name' => 'parentToLocal','type' => 'func', 'req' => ['point']],
            ['name' => 'localToParent','type' => 'func', 'req' => ['point']],
            ['name' => 'fitBounds','type' => 'func', 'req' => ['rectangle'], 'opt' => ['fill']]
        ],
        'event' => [
            ['name' => 'on','type' => 'func', 'req' => ['type', 'function']],
            ['name' => 'on','type' => 'func', 'req' => ['object']],
            ['name' => 'off','type' => 'func', 'req' => ['type', 'function']],
            ['name' => 'off','type' => 'func', 'req' => ['object']],
            ['name' => 'emit','type' => 'func', 'req' => ['type', 'event']],
            ['name' => 'responds','type' => 'func', 'req' => ['type']]
        ],
        'remove' => [
            ['name' => 'removeOn','type' => 'func', 'req' => ['options']],
            ['name' => 'removeOnMove','type' => 'func'],
            ['name' => 'removeOnDown','type' => 'func'],
            ['name' => 'removeOnDrag','type' => 'func'],
            ['name' => 'removeOnUp','type' => 'func']
        ]
    ],
    'PathItem' => [
        'extends' => ['Item'],
        'properties' => [
            ['name' => 'pathData','type' => 'val']
        ],
        'operation' => [
            ['name' => 'unite','req' => ['path']],
            ['name' => 'intersect','req' => ['path']],
            ['name' => 'subtract','req' => ['path']],
            ['name' => 'exclude','req' => ['path']],
            ['name' => 'divide','req' => ['path']]
        ]
    ],
    'Group' => [
        'extends' => ['Item'],
        'properties' => [
            ['name' => 'clipped','type' => 'boolean']
        ]
    ],
    'Path' => [
        'extends' => ['PathItem','Item'],
        'properties' => [

            [ 'name' => 'segments', 'type' => 'Segments'],
            [ 'name' => 'firstSegment', 'type' => 'Segment'],
            [ 'name' => 'lastSegment', 'type' => 'Segment'],
            [ 'name' => 'curves', 'type' => 'Curves'],
            [ 'name' => 'firstCurve', 'type' => 'Curve'],
            [ 'name' => 'lastCurve', 'type' => 'Curve'],
            [ 'name' => 'closed', 'type' => 'Boolean'],
            [ 'name' => 'length', 'type' => 'Number'],
            [ 'name' => 'area', 'type' => 'Number'],
            [ 'name' => 'clockwise', 'type' => 'Boolean'],
            [ 'name' => 'fullySelected', 'type' => 'Boolean'],
            [ 'name' => 'interiorPoint', 'type' => 'Point' ]

        ]
    ]

    ];

?>


