<?php error_reporting(1);
include 'deleteOrder.php';
//include $_SERVER['DOCUMENT_ROOT']."/writer/new/includes/uniques.php";
session_start();
if (!isLoggedIn()) {
    header('location:/logout');

}
if (!isset($_GET['order_id']) | empty($_GET['order_id'])) {
    header('location:' . $_SERVER['HTTP_REFERER']);

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Place Bid | Order <?php echo $_GET['order_id']; ?></title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <?php getBootsrap(); ?>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="Stylesheet" href="CSS/jquery.dialog.css">
    <link rel="Stylesheet" href="../css/notify.css">
    <style>
        .table > tbody > tr > td, .table > tfoot > tr > td {
            vertical-align: middle;
        }

        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            body {
                background: black;
            }

            .clock {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                color: #17D4FE;
                font-size: 60px;
                font-family: Orbitron;
                letter-spacing: 7px;


            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }


            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }

        }</style>
<body <?php if (isAdmin()) {
    echo 'class="fixed-nav sticky-footer bg-dark" id="page-top"';
} elseif (isaWriter()) {
    echo 'class="page-header-fixed"';

} ?>>
<?php
if (!isaWriter()) {
    getContextHeader();

}
?>

<script type="text/javascript">
    function Del(order_id) {
        Notify.confirm({
            title: 'Delete Order! ',
            html: '<b>Do you want to delete on this order?</b>',
            ok: function () {
                window.location.href = 'deleteOrder.php?order_id=' + order_id + '&param=42';
            },
            cancel: function () {
                Notify.alert('cancel');
            }

        });


    }

    function autoAssign(order_id) {
        Notify.confirm({
            title: 'Auto assign Order ',
            html: '<b>Do you want the system to automatically assign this order?</b><br>The system assigns the order to the best writer<br>according to rating, order completion and reviews',
            ok: function () {
                window.location.href = '/writer/new/admin/pages/update_exam.php?order_id=' + order_id + '&param=49';
            },
            cancel: function () {
                Notify.alert('cancel');
            }

        });


    }
</script><?php

$order_id = $_GET['order_id'];

$connection = getConnection();

$query = "select * from orders where order_id='" . $order_id . "'";


$result = mysqli_query($connection, $query) or die($connection->error);
if ($result->num_rows <= 0) {
    header('location:/errors/404.php');
}
while ($row = mysqli_fetch_array($result)) {
    if ($row['state'] == 'progress' && $row['writer_id'] != $_SESSION['my_id']) {
        header('location:' . $_SERVER['HTTP_REFERER']);
    } elseif ($row['state'] == 'completed' && $row['writer_id'] != $_SESSION['my_id']) {
        header('location:/errors/404.php');
    }
    if ($row['state'] == 'failed' && $row['writer_id'] != $_SESSION['my_id']) {
        header('location:/errors/404.php');
    }
    if ($row['state'] == 'pending' && $row['writer_id'] != $_SESSION['my_id']) {
        header('location:/errors/404.php');
    }

    if (isAdmin()) {
        $query="SELECT solution from orders where order_id='$order_id'";
       $sol=$connection->query($query) or die($connection->error);
       $solu=$sol->fetch_assoc();
if($solu['solution']=='unavailable'){
    $rev = "<div class=\"alert-warning\">
  This order has not been uploaded yet.
</div>";
}else{

   $file=explode('-',$solu['solution']);
   for($i=0;$i<sizeof($file);$i++){
       $path=$file[$i];
       $ext=explode('.',$path);

       $rev .= '<div class=\"container\"><img src="/images/icon_download.png" class="btn btn-success" href="/uploads/AuthoP39Q" download="yyyrtrf" height="40px" width="40px"/>
</div>';
   } }
        $menu = "<tr><td><i class=\"fa fa-trash\" onclick='Del(" . $order_id . ")'></i> Delete</td></tr>
<tr><td><img src='/images/icon_assign.png' height='35px' width='33px' onclick='autoAssign(" . $order_id . ")'/>  Auto Assign</td></tr>
<tr><td><a href=\"new/admin/view-questions.php?content=bids&&order_id=" . $order_id . "\"> <img src=\"/images/icon-bids.png\" height='30px' width='29px'/>  View Bids</td></a></tr>";
    } else {
        $menu = '<tr><td><i class="fa fa-trash-alt">Request Extension</i></td></tr>';

        if ($row['state'] == 'completed' && $row['writer_id'] == $_SESSION['my_id']) {
            $rev = "<div class=\"alert-success\">
  Order Completed
</div>";
        } elseif ($row['state'] == 'pending' && $row['writer_id'] == $_SESSION['my_id']) {
            $rev = "<div class=\"alert-warning\">
  Awaiting QA approval
</div>";
        } elseif ($row['state'] == 'cancelled' && $row['writer_id'] == $_SESSION['my_id']) {
            $rev = "<div class=\"alert-danger\">
  You failed to deliver this order. QA department might fine you for this.
</div>";
        } elseif ($row['state'] == 'progress' && $row['writer_id'] == $_SESSION['my_id']) {
            $rev = '
        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <noscript
          ><input
            type="hidden"
            name="redirect"
            value="/"
        /></noscript>
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
       
          <div class="col-lg-7">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>Add files...</span>
               <input type="hidden" value="' . base64_encode('formUpload') . '" name="section" hidden>
              <input type="file" name="files[]" id="files[]" multiple />
            </span>
            <button type="submit" class="btn btn-primary start">
              <i class="glyphicon glyphicon-upload"></i>
              <span>Start upload</span>
            </button>
            <button type="reset" class="btn btn-warning cancel">
              <i class="glyphicon glyphicon-ban-circle"></i>
              <span>Cancel upload</span>
            </button>
    ';
        } elseif ($row['state'] == 'available' && !isAdmin()) {
            $writer_id = $_SESSION['my_id'];
            $sqlqw = "SELECT * FROM  bids WHERE order_id='$order_id' AND writer_id='$writer_id'";
            $resultqw = $connection->query($sqlqw) or die($connection->error);
            if ($resultqw->num_rows > 0) {
                $rev = "<div class=\"alert alert-success\">
You placed your bid. Please wait for admin
</div>";
            } else {
                $rev = "<div class=\"input-group\">
<input type='hidden'  value='placebid' id='action' hidden>
<button type='submit' class='btn btn-info'>
  <img src=\"/images/icon_bid_now.png\" height='40px' width='40px'/><span>  Bid Now</span></button>
</div>";
            }
        } else {
            if ($row['solution'] == 'unavailable') {
                $rev = "<div class=\"input-group\">
  <div class=\"input-group-prepend\">
    <span class=\"input-group-text\" id=\"inputGroupFileAddon01\">Upload</span>
  </div>
  <div class=\"custom-file\">
    <input type=\"file\" class=\"custom-file-input\" id=\"inputGroupFile02\" placeholder='upload your solution'>
    <label class=\"custom-file-label\" for=\"inputGroupFile01\">Choose file</label>
  </div>
</div>";
            } elseif ($row['solution'] == 'revision') {
                $rev = "<div class=\"input-group\">
  <div class=\"input-group-prepend\">
    <span class=\"input-group-text\" id=\"inputGroupFileAddon01\">Upload</span>
  </div>
  <div class=\"custom-file\">
    <input type=\"file\" class=\"custom-file-input\" id=\"inputGroupFile01\" placeholder='Upload a revised paper'>
    <label class=\"custom-file-label\" for=\"inputGroupFile01\">Choose file</label>
  </div>
</div>";

            }
        }
    }
    if ($row['due_date'] < time()) {
        $date = '<div class="alert alert-danger">' . date('M j Y g:i A', strtotime($row['due_date'])) . '</div>';
    } else {
        $date = '<div class="alert alert-warning">' . date('M j Y g:i A', strtotime($row['due_date'])) . '</div>';
    }

    $cpp = $row['order_total'] / $row['pages'];
    $order = '
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Order Details</H1>
            <div class="row">
                <div class="tabs_div">
                    <ul>
                        <li>General Description</li>
                        <li>Compensation Details</li>
                        <li>Deadline</li>
                        <li>Solution</li>
                        <li><i class="fa fa-bars" aria-hidden="true"></i></li>
                    </ul>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="success">Order ID: </td>
                                    <td>#' . $row['order_id'] . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Title: </td>
                                    <td>' . $row['title'] . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Description: </td>
                                    <td>' . $row['descri'] . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Level : </td>
                                    <td>' . $row['level'] . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Formating Style: </td>
                                    <td>' . $row['Format'] . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Additional Files: </td>
                                    <td>' . $row['add_files'] . '</td>
								</tr>
								<tr>
                                    <td class="success">Pages: </td>
                                    <td>' . $row['pages'] . '</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="success">Cost Per page: </td>
                                    <td>$' . $row['order_total'] / $row['pages'] * 0.4 . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Pages: </td>
                                    <td>' . $row['pages'] . '</td>
                                </tr>
                                <tr>
                                    <td class="success">Total Cost: </td>
                                    <td>$' . $row['order_total'] * 0.4 . '</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="success">Deadline: </td>
									<td>
									' . $date . '
									</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    ' . $rev . '
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                ' . $menu . '
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-glow/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $(".tabs_div").shieldTabs();
	});
	/*! jQuery UI - v1.12.1+0b7246b6eeadfa9e2696e22f3230f6452f8129dc - 2020-02-20
 * http://jqueryui.com
 * Includes: widget.js
 * Copyright jQuery Foundation and other contributors; Licensed MIT */

/* global define, require */
/* eslint-disable no-param-reassign, new-cap, jsdoc/require-jsdoc */

(function(factory) {
  \'use strict\';
  if (typeof define === \'function\' && define.amd) {
    // AMD. Register as an anonymous module.
    define([\'jquery\'], factory);
  } else if (typeof exports === \'object\') {
    // Node/CommonJS
    factory(require(\'jquery\'));
  } else {
    // Browser globals
    factory(window.jQuery);
  }
})(function($) {
  (\'use strict\');

  $.ui = $.ui || {};

  $.ui.version = \'1.12.1\';

  /*!
   * jQuery UI Widget 1.12.1
   * http://jqueryui.com
   *
   * Copyright jQuery Foundation and other contributors
   * Released under the MIT license.
   * http://jquery.org/license
   */

  //>>label: Widget
  //>>group: Core
  //>>description: Provides a factory for creating stateful widgets with a common API.
  //>>docs: http://api.jqueryui.com/jQuery.widget/
  //>>demos: http://jqueryui.com/widget/

  // Support: jQuery 1.9.x or older
  // $.expr[ ":" ] is deprecated.
  if (!$.expr.pseudos) {
    $.expr.pseudos = $.expr[\':\'];
  }

  // Support: jQuery 1.11.x or older
  // $.unique has been renamed to $.uniqueSort
  if (!$.uniqueSort) {
    $.uniqueSort = $.unique;
  }

  var widgetUuid = 0;
  var widgetHasOwnProperty = Array.prototype.hasOwnProperty;
  var widgetSlice = Array.prototype.slice;

  $.cleanData = (function(orig) {
    return function(elems) {
      var events, elem, i;
      // eslint-disable-next-line eqeqeq
      for (i = 0; (elem = elems[i]) != null; i++) {
        // Only trigger remove when necessary to save time
        events = $._data(elem, \'events\');
        if (events && events.remove) {
          $(elem).triggerHandler(\'remove\');
        }
      }
      orig(elems);
    };
  })($.cleanData);

  $.widget = function(name, base, prototype) {
    var existingConstructor, constructor, basePrototype;

    // ProxiedPrototype allows the provided prototype to remain unmodified
    // so that it can be used as a mixin for multiple widgets (#8876)
    var proxiedPrototype = {};

    var namespace = name.split(\'.\')[0];
    name = name.split(\'.\')[1];
    var fullName = namespace + \'-\' + name;

    if (!prototype) {
      prototype = base;
      base = $.Widget;
    }

    if ($.isArray(prototype)) {
      prototype = $.extend.apply(null, [{}].concat(prototype));
    }

    // Create selector for plugin
    $.expr.pseudos[fullName.toLowerCase()] = function(elem) {
      return !!$.data(elem, fullName);
    };

    $[namespace] = $[namespace] || {};
    existingConstructor = $[namespace][name];
    constructor = $[namespace][name] = function(options, element) {
      // Allow instantiation without "new" keyword
      if (!this._createWidget) {
        return new constructor(options, element);
      }

      // Allow instantiation without initializing for simple inheritance
      // must use "new" keyword (the code above always passes args)
      if (arguments.length) {
        this._createWidget(options, element);
      }
    };

    // Extend with the existing constructor to carry over any static properties
    $.extend(constructor, existingConstructor, {
      version: prototype.version,

      // Copy the object used to create the prototype in case we need to
      // redefine the widget later
      _proto: $.extend({}, prototype),

      // Track widgets that inherit from this widget in case this widget is
      // redefined after a widget inherits from it
      _childConstructors: []
    });

    basePrototype = new base();

    // We need to make the options hash a property directly on the new instance
    // otherwise we\'ll modify the options hash on the prototype that we\'re
    // inheriting from
    basePrototype.options = $.widget.extend({}, basePrototype.options);
    $.each(prototype, function(prop, value) {
      if (!$.isFunction(value)) {
        proxiedPrototype[prop] = value;
        return;
      }
      proxiedPrototype[prop] = (function() {
        function _super() {
          return base.prototype[prop].apply(this, arguments);
        }

        function _superApply(args) {
          return base.prototype[prop].apply(this, args);
        }

        return function() {
          var __super = this._super;
          var __superApply = this._superApply;
          var returnValue;

          this._super = _super;
          this._superApply = _superApply;

          returnValue = value.apply(this, arguments);

          this._super = __super;
          this._superApply = __superApply;

          return returnValue;
        };
      })();
    });
    constructor.prototype = $.widget.extend(
      basePrototype,
      {
        // TODO: remove support for widgetEventPrefix
        // always use the name + a colon as the prefix, e.g., draggable:start
        // don\'t prefix for widgets that aren\'t DOM-based
        widgetEventPrefix: existingConstructor
          ? basePrototype.widgetEventPrefix || name
          : name
      },
      proxiedPrototype,
      {
        constructor: constructor,
        namespace: namespace,
        widgetName: name,
        widgetFullName: fullName
      }
    );

    // If this widget is being redefined then we need to find all widgets that
    // are inheriting from it and redefine all of them so that they inherit from
    // the new version of this widget. We\'re essentially trying to replace one
    // level in the prototype chain.
    if (existingConstructor) {
      $.each(existingConstructor._childConstructors, function(i, child) {
        var childPrototype = child.prototype;

        // Redefine the child widget using the same prototype that was
        // originally used, but inherit from the new version of the base
        $.widget(
          childPrototype.namespace + \'.\' + childPrototype.widgetName,
          constructor,
          child._proto
        );
      });

      // Remove the list of existing child constructors from the old constructor
      // so the old child constructors can be garbage collected
      delete existingConstructor._childConstructors;
    } else {
      base._childConstructors.push(constructor);
    }

    $.widget.bridge(name, constructor);

    return constructor;
  };

  $.widget.extend = function(target) {
    var input = widgetSlice.call(arguments, 1);
    var inputIndex = 0;
    var inputLength = input.length;
    var key;
    var value;

    for (; inputIndex < inputLength; inputIndex++) {
      for (key in input[inputIndex]) {
        value = input[inputIndex][key];
        if (
          widgetHasOwnProperty.call(input[inputIndex], key) &&
          value !== undefined
        ) {
          // Clone objects
          if ($.isPlainObject(value)) {
            target[key] = $.isPlainObject(target[key])
              ? $.widget.extend({}, target[key], value)
              : // Don\'t extend strings, arrays, etc. with objects
                $.widget.extend({}, value);

            // Copy everything else by reference
          } else {
            target[key] = value;
          }
        }
      }
    }
    return target;
  };

  $.widget.bridge = function(name, object) {
    var fullName = object.prototype.widgetFullName || name;
    $.fn[name] = function(options) {
      var isMethodCall = typeof options === \'string\';
      var args = widgetSlice.call(arguments, 1);
      var returnValue = this;

      if (isMethodCall) {
        // If this is an empty collection, we need to have the instance method
        // return undefined instead of the jQuery instance
        if (!this.length && options === \'instance\') {
          returnValue = undefined;
        } else {
          this.each(function() {
            var methodValue;
            var instance = $.data(this, fullName);

            if (options === \'instance\') {
              returnValue = instance;
              return false;
            }

            if (!instance) {
              return $.error(
                \'cannot call methods on \' +
                  name +
                  \' prior to initialization; \' +
                  "attempted to call method \'" +
                  options +
                  "\'"
              );
            }

            if (!$.isFunction(instance[options]) || options.charAt(0) === \'_\') {
              return $.error(
                "no such method \'" +
                  options +
                  "\' for " +
                  name +
                  \' widget instance\'
              );
            }

            methodValue = instance[options].apply(instance, args);

            if (methodValue !== instance && methodValue !== undefined) {
              returnValue =
                methodValue && methodValue.jquery
                  ? returnValue.pushStack(methodValue.get())
                  : methodValue;
              return false;
            }
          });
        }
      } else {
        // Allow multiple hashes to be passed on init
        if (args.length) {
          options = $.widget.extend.apply(null, [options].concat(args));
        }

        this.each(function() {
          var instance = $.data(this, fullName);
          if (instance) {
            instance.option(options || {});
            if (instance._init) {
              instance._init();
            }
          } else {
            $.data(this, fullName, new object(options, this));
          }
        });
      }

      return returnValue;
    };
  };

  $.Widget = function(/* options, element */) {};
  $.Widget._childConstructors = [];

  $.Widget.prototype = {
    widgetName: \'widget\',
    widgetEventPrefix: \'\',
    defaultElement: \'<div>\',

    options: {
      classes: {},
      disabled: false,

      // Callbacks
      create: null
    },

    _createWidget: function(options, element) {
      element = $(element || this.defaultElement || this)[0];
      this.element = $(element);
      this.uuid = widgetUuid++;
      this.eventNamespace = \'.\' + this.widgetName + this.uuid;

      this.bindings = $();
      this.hoverable = $();
      this.focusable = $();
      this.classesElementLookup = {};

      if (element !== this) {
        $.data(element, this.widgetFullName, this);
        this._on(true, this.element, {
          remove: function(event) {
            if (event.target === element) {
              this.destroy();
            }
          }
        });
        this.document = $(
          element.style
            ? // Element within the document
              element.ownerDocument
            : // Element is window or document
              element.document || element
        );
        this.window = $(
          this.document[0].defaultView || this.document[0].parentWindow
        );
      }

      this.options = $.widget.extend(
        {},
        this.options,
        this._getCreateOptions(),
        options
      );

      this._create();

      if (this.options.disabled) {
        this._setOptionDisabled(this.options.disabled);
      }

      this._trigger(\'create\', null, this._getCreateEventData());
      this._init();
    },

    _getCreateOptions: function() {
      return {};
    },

    _getCreateEventData: $.noop,

    _create: $.noop,

    _init: $.noop,

    destroy: function() {
      var that = this;

      this._destroy();
      $.each(this.classesElementLookup, function(key, value) {
        that._removeClass(value, key);
      });

      // We can probably remove the unbind calls in 2.0
      // all event bindings should go through this._on()
      this.element.off(this.eventNamespace).removeData(this.widgetFullName);
      this.widget()
        .off(this.eventNamespace)
        .removeAttr(\'aria-disabled\');

      // Clean up events and states
      this.bindings.off(this.eventNamespace);
    },

    _destroy: $.noop,

    widget: function() {
      return this.element;
    },

    option: function(key, value) {
      var options = key;
      var parts;
      var curOption;
      var i;

      if (arguments.length === 0) {
        // Don\'t return a reference to the internal hash
        return $.widget.extend({}, this.options);
      }

      if (typeof key === \'string\') {
        // Handle nested keys, e.g., "foo.bar" => { foo: { bar: ___ } }
        options = {};
        parts = key.split(\'.\');
        key = parts.shift();
        if (parts.length) {
          curOption = options[key] = $.widget.extend({}, this.options[key]);
          for (i = 0; i < parts.length - 1; i++) {
            curOption[parts[i]] = curOption[parts[i]] || {};
            curOption = curOption[parts[i]];
          }
          key = parts.pop();
          if (arguments.length === 1) {
            return curOption[key] === undefined ? null : curOption[key];
          }
          curOption[key] = value;
        } else {
          if (arguments.length === 1) {
            return this.options[key] === undefined ? null : this.options[key];
          }
          options[key] = value;
        }
      }

      this._setOptions(options);

      return this;
    },

    _setOptions: function(options) {
      var key;

      for (key in options) {
        this._setOption(key, options[key]);
      }

      return this;
    },

    _setOption: function(key, value) {
      if (key === \'classes\') {
        this._setOptionClasses(value);
      }

      this.options[key] = value;

      if (key === \'disabled\') {
        this._setOptionDisabled(value);
      }

      return this;
    },

    _setOptionClasses: function(value) {
      var classKey, elements, currentElements;

      for (classKey in value) {
        currentElements = this.classesElementLookup[classKey];
        if (
          value[classKey] === this.options.classes[classKey] ||
          !currentElements ||
          !currentElements.length
        ) {
          continue;
        }

        // We are doing this to create a new jQuery object because the _removeClass() call
        // on the next line is going to destroy the reference to the current elements being
        // tracked. We need to save a copy of this collection so that we can add the new classes
        // below.
        elements = $(currentElements.get());
        this._removeClass(currentElements, classKey);

        // We don\'t use _addClass() here, because that uses this.options.classes
        // for generating the string of classes. We want to use the value passed in from
        // _setOption(), this is the new value of the classes option which was passed to
        // _setOption(). We pass this value directly to _classes().
        elements.addClass(
          this._classes({
            element: elements,
            keys: classKey,
            classes: value,
            add: true
          })
        );
      }
    },

    _setOptionDisabled: function(value) {
      this._toggleClass(
        this.widget(),
        this.widgetFullName + \'-disabled\',
        null,
        !!value
      );

      // If the widget is becoming disabled, then nothing is interactive
      if (value) {
        this._removeClass(this.hoverable, null, \'ui-state-hover\');
        this._removeClass(this.focusable, null, \'ui-state-focus\');
      }
    },

    enable: function() {
      return this._setOptions({ disabled: false });
    },

    disable: function() {
      return this._setOptions({ disabled: true });
    },

    _classes: function(options) {
      var full = [];
      var that = this;

      options = $.extend(
        {
          element: this.element,
          classes: this.options.classes || {}
        },
        options
      );

      function bindRemoveEvent() {
        options.element.each(function(_, element) {
          var isTracked = $.map(that.classesElementLookup, function(elements) {
            return elements;
          }).some(function(elements) {
            return elements.is(element);
          });

          if (!isTracked) {
            that._on($(element), {
              remove: \'_untrackClassesElement\'
            });
          }
        });
      }

      function processClassString(classes, checkOption) {
        var current, i;
        for (i = 0; i < classes.length; i++) {
          current = that.classesElementLookup[classes[i]] || $();
          if (options.add) {
            bindRemoveEvent();
            current = $(
              $.uniqueSort(current.get().concat(options.element.get()))
            );
          } else {
            current = $(current.not(options.element).get());
          }
          that.classesElementLookup[classes[i]] = current;
          full.push(classes[i]);
          if (checkOption && options.classes[classes[i]]) {
            full.push(options.classes[classes[i]]);
          }
        }
      }

      if (options.keys) {
        processClassString(options.keys.match(/\S+/g) || [], true);
      }
      if (options.extra) {
        processClassString(options.extra.match(/\S+/g) || []);
      }

      return full.join(\' \');
    },

    _untrackClassesElement: function(event) {
      var that = this;
      $.each(that.classesElementLookup, function(key, value) {
        if ($.inArray(event.target, value) !== -1) {
          that.classesElementLookup[key] = $(value.not(event.target).get());
        }
      });

      this._off($(event.target));
    },

    _removeClass: function(element, keys, extra) {
      return this._toggleClass(element, keys, extra, false);
    },

    _addClass: function(element, keys, extra) {
      return this._toggleClass(element, keys, extra, true);
    },

    _toggleClass: function(element, keys, extra, add) {
      add = typeof add === \'boolean\' ? add : extra;
      var shift = typeof element === \'string\' || element === null,
        options = {
          extra: shift ? keys : extra,
          keys: shift ? element : keys,
          element: shift ? this.element : element,
          add: add
        };
      options.element.toggleClass(this._classes(options), add);
      return this;
    },

    _on: function(suppressDisabledCheck, element, handlers) {
      var delegateElement;
      var instance = this;

      // No suppressDisabledCheck flag, shuffle arguments
      if (typeof suppressDisabledCheck !== \'boolean\') {
        handlers = element;
        element = suppressDisabledCheck;
        suppressDisabledCheck = false;
      }

      // No element argument, shuffle and use this.element
      if (!handlers) {
        handlers = element;
        element = this.element;
        delegateElement = this.widget();
      } else {
        element = delegateElement = $(element);
        this.bindings = this.bindings.add(element);
      }

      $.each(handlers, function(event, handler) {
        function handlerProxy() {
          // Allow widgets to customize the disabled handling
          // - disabled as an array instead of boolean
          // - disabled class as method for disabling individual parts
          if (
            !suppressDisabledCheck &&
            (instance.options.disabled === true ||
              $(this).hasClass(\'ui-state-disabled\'))
          ) {
            return;
          }
          return (typeof handler === \'string\'
            ? instance[handler]
            : handler
          ).apply(instance, arguments);
        }

        // Copy the guid so direct unbinding works
        if (typeof handler !== \'string\') {
          handlerProxy.guid = handler.guid =
            handler.guid || handlerProxy.guid || $.guid++;
        }

        var match = event.match(/^([\w:-]*)\s*(.*)$/);
        var eventName = match[1] + instance.eventNamespace;
        var selector = match[2];

        if (selector) {
          delegateElement.on(eventName, selector, handlerProxy);
        } else {
          element.on(eventName, handlerProxy);
        }
      });
    },

    _off: function(element, eventName) {
      eventName =
        (eventName || \'\').split(\' \').join(this.eventNamespace + \' \') +
        this.eventNamespace;
      element.off(eventName);

      // Clear the stack to avoid memory leaks (#10056)
      this.bindings = $(this.bindings.not(element).get());
      this.focusable = $(this.focusable.not(element).get());
      this.hoverable = $(this.hoverable.not(element).get());
    },

    _delay: function(handler, delay) {
      var instance = this;
      function handlerProxy() {
        return (typeof handler === \'string\'
          ? instance[handler]
          : handler
        ).apply(instance, arguments);
      }
      return setTimeout(handlerProxy, delay || 0);
    },

    _hoverable: function(element) {
      this.hoverable = this.hoverable.add(element);
      this._on(element, {
        mouseenter: function(event) {
          this._addClass($(event.currentTarget), null, \'ui-state-hover\');
        },
        mouseleave: function(event) {
          this._removeClass($(event.currentTarget), null, \'ui-state-hover\');
        }
      });
    },

    _focusable: function(element) {
      this.focusable = this.focusable.add(element);
      this._on(element, {
        focusin: function(event) {
          this._addClass($(event.currentTarget), null, \'ui-state-focus\');
        },
        focusout: function(event) {
          this._removeClass($(event.currentTarget), null, \'ui-state-focus\');
        }
      });
    },

    _trigger: function(type, event, data) {
      var prop, orig;
      var callback = this.options[type];

      data = data || {};
      event = $.Event(event);
      event.type = (type === this.widgetEventPrefix
        ? type
        : this.widgetEventPrefix + type
      ).toLowerCase();

      // The original event may come from any element
      // so we need to reset the target on the new event
      event.target = this.element[0];

      // Copy original event properties over to the new event
      orig = event.originalEvent;
      if (orig) {
        for (prop in orig) {
          if (!(prop in event)) {
            event[prop] = orig[prop];
          }
        }
      }

      this.element.trigger(event, data);
      return !(
        ($.isFunction(callback) &&
          callback.apply(this.element[0], [event].concat(data)) === false) ||
        event.isDefaultPrevented()
      );
    }
  };

  $.each({ show: \'fadeIn\', hide: \'fadeOut\' }, function(method, defaultEffect) {
    $.Widget.prototype[\'_\' + method] = function(element, options, callback) {
      if (typeof options === \'string\') {
        options = { effect: options };
      }

      var hasOptions;
      var effectName = !options
        ? method
        : options === true || typeof options === \'number\'
        ? defaultEffect
        : options.effect || defaultEffect;

      options = options || {};
      if (typeof options === \'number\') {
        options = { duration: options };
      }

      hasOptions = !$.isEmptyObject(options);
      options.complete = callback;

      if (options.delay) {
        element.delay(options.delay);
      }

      if (hasOptions && $.effects && $.effects.effect[effectName]) {
        element[method](options);
      } else if (effectName !== method && element[effectName]) {
        element[effectName](options.duration, options.easing, callback);
      } else {
        element.queue(function(next) {
          $(this)[method]();
          if (callback) {
            callback.call(element[0]);
          }
          next();
        });
      }
    };
  });
});
	
	
</script>

<style>
    .pb-product-details-ul {
        list-style-type: none;
        padding-left: 0;
        color: black;
    }

        .pb-product-details-ul > li {
            padding-bottom: 5px;
            font-size: 15px;
        }

    #gradient {
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#feffff+0,ddf1f9+31,a0d8ef+62 */
        background: #feffff; /* Old browsers */
        background: -moz-linear-gradient(left, #feffff 0%, #ddf1f9 31%, #a0d8ef 62%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); 
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#feffff\', endColorstr=\'#a0d8ef\',GradientType=1 ); 
        border: 1px solid #f2f2f2;
        padding: 20px;
    }

    #hits {
        border-right: 1px solid white;
        border-left: 1px solid white;
        vertical-align: middle;
        padding-top: 15px;
        font-size: 17px;
        color: white;
    }

    #fan {
        vertical-align: middle;
        padding-top: 15px;
        font-size: 17px;
        color: white;
    }

    .pb-product-details-fa > span {
        padding-top: 20px;
    }
</style>';
}


?>
<div class="content-wrapper">


    <div class="container-fluid">

        <form action="/order/dashboard.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="formid" value="qjbw3h4o4292" required>
            <input type="hidden" name="orderid" value="<?php echo $order_id; ?>">
            <input type="hidden" name="writerid" value="<?php echo $_SESSION['my_id']; ?>">
            <?php echo $order; ?>
        </form>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == true) {
            if (isAdmin()) {
                echo '<div class="alert alert-success">
Success
</div>';
            } else {
                echo '<div class="alert alert-success">
Bid was placed successfully
</div>';
            }

        }
        if (isset($_GET['err']) && $_GET['err'] == 'duplicaterequest') {

            echo '<div class="alert alert-danger">

You cannot bid on the same order twice
<meta http-equiv="refresh" content="2;/Home">
</div>';

        } ?>

    </div>
</div>
<script src="js/jquery.dialog.js"></script>
<script src="../js/notify.js"></script>
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Doka Image Editor polyfills -->
<script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
                      <p class="name">{%=file.name%}</p>
                  {% } %}
                  <strong class="error text-danger"></strong>
              </td>
              <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td>
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>Edit</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <button class="btn btn-primary start" disabled>
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>Start</span>
                      </button>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}

</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-download fade">
              <td>
                  <span class="preview">
                      {% if (file.thumbnailUrl) { %}
                          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                      {% } %}
                  </span>
              </td>
              <td>
                  {% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}
                      <p class="name">
                          {% if (file.url) { %}
                              <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                          {% } else { %}
                              <span>{%=file.name%}</span>
                          {% } %}
                      </p>
                  {% } %}
                  {% if (file.error) { %}
                      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                  {% } %}
              </td>
              <td>
                  <span class="size">{%=o.formatFileSize(file.size)%}</span>
              </td>
              <td>
                  {% if (file.deleteUrl) { %}
                      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                          <i class="glyphicon glyphicon-trash"></i>
                          <span>Delete</span>
                      </button>
                      <input type="checkbox" name="delete" value="1" class="toggle">
                  {% } else { %}
                      <button class="btn btn-warning cancel">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel</span>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}

</script>
<script>
    [
        {
            supported: 'Promise' in window,
            fill:
                'https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js'
        },
        {
            supported: 'fetch' in window,
            fill: 'https://cdn.jsdelivr.net/npm/fetch-polyfill@0.8.2/fetch.min.js'
        },
        {
            supported:
                'CustomEvent' in window &&
                'log10' in Math &&
                'sign' in Math &&
                'assign' in Object &&
                'from' in Array &&
                ['find', 'findIndex', 'includes'].reduce(function (previous, prop) {
                    return prop in Array.prototype ? previous : false;
                }, true),
            fill: 'js/vendor/doka.polyfill.min.js'
        }
    ].forEach(function (p) {
        if (p.supported) return;
        document.write('<script src="' + p.fill + '"><\/script>');
    });
</script>


</body>
</html>