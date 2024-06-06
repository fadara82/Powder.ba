$(document).ready(function () {
  $("main#spapp > section").height($(document).height() - 60);

  // var app = $.spapp({pageNotFound : 'error_404'}); // initialize
  var app = $.spapp({
    defaultView: "#main",
    templateDir: "./tmpl/",
    //pageNotFound : "error_404"
  });

  // define routes
  app.route({
    view: "main",
    onCreate: function () {},
    onReady: function () {},
    load: "home.html",
  });
  app.route({
    view: "registration",
    load: "registration.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "login",
    load: "login.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "shopitem",
    load: "shopitem.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "shopingcart",
    load: "shopingcart.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "users",
    load: "users.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "orders",
    load: "orders.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "checkout",
    load: "checkout.html",
    onCreate: function () {},
    onReady: function () {},
  });
  app.route({
    view: "admin",
    load: "admin.html",
    onCreate: function () {},
    onReady: function () {},
  });

  app.run();
});
