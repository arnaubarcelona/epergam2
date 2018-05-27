if (location.hostname == 'localhost') {
    var app_path = location.protocol + '//' + location.hostname + ':' + location.port + '/';
} else {
    var app_path = location.protocol + '//' + location.hostname + '/epergam2/';
}

$(document).ready(function () {
    $('.multiple_autocomplete').select2({
        tags: true,
        tokenSeparators: [';'],
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Check author/author_types exists
            checkAuthorTypesExists(e.params.data, e.target);
        }
    });

    $('.single_autocomplete').select2();


    $('.add_location').select2({
        tags: true,
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Add new publication_place if not exists
            checkLocationExists(e.params.data, e.target);
        }
    });
    
    $('.add_publication_place').select2({
        tags: true,
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Add new publicacion_place if not exists
            checkPublicationPlaceExists(e.params.data, e.target);
        }
    });

    $('.add_collection').select2({
        tags: true,
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Add new locations if not exists
            checkCollectionExists(e.params.data, e.target);
        }
    });

    $('.check_languages').select2({
        tags: true,
        tokenSeparators: [';'],
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Check languages exists
            checkLanguageExists(e.params.data, e.target);
        }
    });

    $('.check_publishers').select2({
        tags: true,
        tokenSeparators: [';'],
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Check publishers exists
            checkPublisherExists(e.params.data, e.target);
        }
    });
    
    $('.check_subjects').select2({
        tags: true,
        tokenSeparators: [';'],
        createTag: function (params) {
            return {
                id: params.term,
                text: params.term,
                // add indicator flag
                isNew : true
            };
        }
    }).on("select2:select", function(e) {
        if(e.params.data.isNew) {
            // Check subject exists
            checkSubjectExists(e.params.data, e.target);
        }
    });
});

function checkAuthorTypesExists(data, targetObj)
{
    $.ajax({
        url: app_path + "documents/check-author-types-exists",
        type: 'post',
        data: {
            'data': data
        },
        success: function (result) {
            if (result.status != 'error') {
                var isAuthorFound = true;
                var isAuthorTypeFound = true;
                var isAuthoritiesFound = true;
                var showAuthoritiesMsg = true;
                var authorId = 0;
                var authorityTypeId = 0;

                if ( $.type(result.author["not_exist"]) !== 'undefined' ) {
                    isAuthorFound = false;
                }

                if ( $.type(result.author_type["not_exist"]) !== 'undefined' ) {
                    isAuthorTypeFound = false;
                }

                // Author not found add new author
                if ( !isAuthorFound ) {
                    isAuthoritiesFound = false;
                    showAuthoritiesMsg = false;

                    if (confirm(result.author["name"] + " no es troba a la llista d'autors/es, voleu que s'hi afegeixi?") == true) {
                        addNewAuthor(result.author["name"], function (ajaxResp) {
                            if (ajaxResp.status == 'success') {
                                authorId = ajaxResp.data["id"];
                                alert(ajaxResp.message);
                            } else {
                                alert(ajaxResp.message);
                            }
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    authorId = result.author["id"];
                }

                // Author type not found add new author type
                if ( !isAuthorTypeFound ) {
                    isAuthoritiesFound = false;
                    showAuthoritiesMsg = true;

                    if (confirm(result.author_type["name"] + " no es troba a la llista de tipus d'autoria, voleu que s'hi afegeixi?") == true) {
                        addNewAuthorType(result.author_type["name"], function (ajaxResp) {
                            if (ajaxResp.status == 'success') {
                                authorityTypeId = ajaxResp.data["id"];
                                alert(ajaxResp.message);
                            } else {
                                alert(ajaxResp.message);
                            }
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    authorityTypeId = result.author_type["id"];
                }

                if (isAuthorFound && isAuthorTypeFound) {
                    isAuthoritiesFound = result.authorities["found"];
                    showAuthoritiesMsg = true;
                }

                // Check if author is added obviously add new authorities
                if ( !isAuthoritiesFound ) {
                    var canAddAuthorities = true;

                    if (showAuthoritiesMsg) {
                        canAddAuthorities = confirm(result.author["name"] + " no consta a la llista com a " + result.author_type["name"] + ", voleu que hi consti?");
                    }

                    if (canAddAuthorities) {
                        addNewAuthorities(authorId, authorityTypeId, function (ajaxResp) {
                            if (ajaxResp.status == 'success') {
                                alert(ajaxResp.message);
                            } else {
                                alert(ajaxResp.message);
                            }
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                }
            }
        }
    });
}

function addNewAuthor(authorName, callBack)
{
    $.ajax({
        url: app_path + "authors/add",
        type: 'post',
        async: false,
        data: {
            'name': authorName
        }
    }).done(function(result) {
        callBack(result);
    }).fail(function() {
        callBack(result);
    });
}

function addNewAuthorType(authorType, callBack)
{
    $.ajax({
        url: app_path + "author-types/add",
        type: 'post',
        async: false,
        data: {
            'name': authorType
        }
    }).done(function(result) {
        callBack(result);
    }).fail(function() {
        callBack(result);
    });
}

function addNewAuthorities(authorId, authorTypeId, callBack)
{
    $.ajax({
        url: app_path + "authorities/add",
        type: 'post',
        async: false,
        data: {
            'author_id': authorId,
            'author_type_id': authorTypeId
        }
    }).done(function(result) {
        callBack(result);
    }).fail(function() {
        callBack(result);
    });
}

function checkLocationExists(data, targetObj)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "locations/isLocationAlreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (!result) {
                    if (confirm(data.text + " no es troba a la llista d'ubicacions, voleu que s'hi afegeixi?") == true) {
                        addLocation(data, targetObj, function (result) {
                            $(targetObj).find('[data-select2-tag="true"]').replaceWith($('<option selected>', { value : result.data.id }).text(data.text).val(result.data.id));
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('[data-select2-tag="true"]').last().remove();
    }
}

function addLocation(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "locations/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}


function checkPublicationPlaceExists(data, targetObj)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "publication-places/isPublicationPlaceAlreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (!result) {
                    if (confirm(data.text + " no es troba a la llista de llocs d'edició, voleu que s'hi afegeixi?") == true) {
                        addPublicationPlace(data, targetObj, function (result) {
                            $(targetObj).find('[data-select2-tag="true"]').replaceWith($('<option selected>', { value : result.data.id }).text(data.text).val(result.data.id));
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('[data-select2-tag="true"]').last().remove();
    }
}

function addPublicationPlace(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "publication_places/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}





function checkCollectionExists(data, targetObj)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "collections/isCollectionAlreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (!result) {
                    if (confirm(data.text + " no es troba a la llista de col·leccions, voleu que s'hi afegeixi?") == true) {
                        addCollection(data, targetObj, function (result) {
                            $(targetObj).find('[data-select2-tag="true"]').replaceWith($('<option selected>', { value : result.data.id }).text(data.text).val(result.data.id));
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('[data-select2-tag="true"]').last().remove();
    }
}

function addCollection(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "collections/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}

function checkLanguageExists(data, targetObj)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "languages/isLanguagesAlreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (!result) {
                    if (confirm(data.text + " no es troba a la llista de llengües, voleu que s'hi afegeixi?") == true) {
                        addLanguage(data, targetObj, function (result) {
                            $(targetObj).find('[data-select2-tag="true"]').replaceWith($('<option selected>', { value : result.data.id }).text(data.text).val(result.data.id));
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('[data-select2-tag="true"]').last().remove();
    }
}

function addLanguage(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "languages/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}

function checkPublisherExists(data, targetObj)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "publishers/isPublisherAlreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (!result) {
                    if (confirm(data.text + " no es troba a la llista d'editorials, voleu que s'hi afegeixi?") == true) {
                        addPublisher(data, targetObj, function (result) {
                            $(targetObj).find('[data-select2-tag="true"]').replaceWith($('<option selected>', { value : result.data.id }).text(data.text).val(result.data.id));
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('[data-select2-tag="true"]').last().remove();
    }
}

function addPublisher(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "publishers/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}

function checkSubjectExists(data, targetObj)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "subjects/isSubjectAlreadyExists",
            type: 'post',
            data: {
                'name': data.text
            },
            success: function (result) {
                if (!result) {
                    if (confirm(data.text + " no es troba a la llista de matèries, voleu afegir-la?") == true) {
                        addSubject(data, targetObj, function (result) {
                            $(targetObj).find('[data-select2-tag="true"]').replaceWith($('<option selected>', { value : result.data.id }).text(data.text).val(result.data.id));
                        });
                    } else {
                        // Remove last element from dropdown
                        $(targetObj).find('[data-select2-tag="true"]').last().remove();
                    }
                } else {
                    $(targetObj).find('[data-select2-tag="true"]').last().remove();
                }
            }
        });
    } else {
        $(targetObj).find('[data-select2-tag="true"]').last().remove();
    }
}

function addSubject(data, targetObj, callBack)
{
    if (data.text != '') {
        $.ajax({
            url: app_path + "subjects/add",
            type: 'post',
            data: {
                'name': data.text
            }
        }).done(function(result) {
            callBack(result);
        }).fail(function() {
            callBack(result);
        });
    }
}
