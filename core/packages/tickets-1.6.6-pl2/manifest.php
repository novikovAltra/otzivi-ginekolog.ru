<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for Tickets.

1.6.6 pl
==========
- Improved installation script for MODX 2.4.

1.6.5 pl
==========
- [#126] Fixed possible issue with thread latest comment

1.6.4 pl
==========
- [#125] fixed deletion of dependent objects.

1.6.3 pl
==========
- Improved performance of installer.
- Fixed possibility to create a new comment with specified rating.
- [getTickets] Fixed parameter &toSeparatePlaceholders.

1.6.2 pl
==========
- [mgr] Fixed special checkboxes handling in Ticket panel.
- Improved performance of Tickets saving.

1.6.1 pl
==========
- Improved counting of totals in AuthorProfile.
- More ratings in AuthorProfile.
- [mgr] Improved authors page.

1.6.0 pl3
==========
- [#113] Added ratings for the authors.
- [#122] [TicketComments] Added parameter &requiredFields for snippet.
- [#122] [TicketComments] Improved frontend errors handling.
- [#111] Ability to load any js and css files on Tickets initialization.
- [#87] Added new tab with the all tickets of the site.
- [#83] Improved extension of TicketsSection page.
- [#84] Added profiles of authors.
- [#83] Improved extension of Ticket page.
- [#61] Ability to specify url of comments thread for opening from manager.
- [mgr] Improved Tickets grid on TicketsSection page.
- [mgr] Improved Threads grid.
- [mgr] Improved Comments grid.
- [mgr] More Comments events.
- [mgr] More Threads events.
- [mgr] New method Tickets::loadManagerFiles for 3rd party components.
- Updated MarkItUp to version 1.1.14.
- Updated Plupload to version 2.1.2.
- Added system settings with tree icons for MODX 2.3.
- Code reformat.
- [#120] Fixed permissions in comments processors.
- [#119] Fixed pagination in comments grid.
- [#118] Tickets::sanitizeString can process simple arrays.
- [#117] Fixed work with "tvs_below_content".
- [#114] [getComments] Fixed showDeleted parameter.
- [#108] Improved method TicketThread::buildTree.
- [#107] Fixed missing tag "bad".
- [getComments] Fixed displaying deleted comments.
- [#93] [TicketComments] Fixed notices about unpublished comments to admins.
- [#81] [TicketForm] Added parameter &bypassFields.

1.5.1 pl
==========
- Improved editing html entities in page titles.

1.5.0 pl
==========
- Ability to specify multiple previews for uploaded images in media source.
- [#115] Fixed tickets uri generation.
- [#110] Fixed aggregate connection to modUser in TicketComment.
- [#95] Ability to remove user files for members of group "Administrator".
- Ability to count guests views of pages. New system setting "tickets.count_guests".

1.4.2 pl1
==========
- Improved sanitization of MODX tags in snippet TicketForm.

1.4.2 rc2
==========
- Changed Gravatar url to https protocol.
- Fixed work with MODX 2.3.
- Fixed sort of tickets grid.
- [#100] Fixed tables resolver.
- Fixed rare bug with users combo on advanced site configuration.

1.4.1 pl
==========
- Improved redirect of NotFound tickets in plugin.

1.4.0 pl1
==========
- Fixed bug with listing of all comments in empty section.
- Fixed processing of "tickets.ticket_max_cut" in tickets processor.
- Comments are now using users photo if exists.
- Added parameter "resources" for TicketForm.

1.4.0 pl
==========
- Added section settings.
- Removed system settings "ticket_id_as_alias" and "section_id_as_alias".
- System settings "ticket_show_in_tree_default", "ticket_isfolder_force" and "ticket_hidemenu_force" moved to section settings.
- System settings "default_template", "disable_jevix_default", "process_tags_default" moved to section settings.
- Added ability to specify custom uris for children tickets.
- Added subscriptions for sections of tickets.
- Added chunks "tpl.Tickets.ticket.email.subscription" and "tpl.Tickets.sections.wrapper".
- New methods: TicketsSection:Subscribe() and TicketsSection::isSubscribed().
- Added new system setting "ticket_max_cut". Now you can specify length of text without tag "cut".
- Added ability to add tickets and comments into favorites.
- Added new snippet "getComments".
- Added new snippet "getStars".
- Added ability to publish and unpublish tickets.
- Added new system setting "unpublished_ticket_page".
- Added ability to upload files for tickets.
- Added permissions for work with files.
- Improved contexts support.
- Improved parameter "returnIds" in snippets.
- Improved handling of "ticketForm" properties and sections verification.
- Improved notifications about unpublished comments and tickets.
- Improved vote for any resource with TicketMeta.
- Improved list chunks.
- [TicketForm] Added ability to disable sisyphus for any fields by setting class "disable-sisyphus".
- [TicketComments] Added parameter "autoPublishGuest" for more flexible management of comments.
- [#80] Fixed innerJoin in getTickets.
- [#76] Fixed auto publication of tickets.
- [#75] Ability to vote for any resource.
- [#74] Fixed ticket panel for new versions of MODX.
- [#72] Fixed handling TVs.
- [#64] Fixed forced processing of introtext by Jevix.
- [mgr] Disabled ability to delete comment via update form.
- Fixed default template on ticket creation.
- Fixed saving ticket properties.

1.3.0 rc3
==========
- [#59] Added changing of opacity of bad comments.
- [#58] Fixed switching the document class from modDocument to Ticket.
- [#57] Added more user placeholders to preview and create comment.
- [#56] Added field "description".
- [#55] Fixed changing of alias when user edit ticket from frontend.
- Added placeholder [[+idx]] to comments.
- Added rating of comments.
- Added rating of tickets.
- Added new snippet TicketMeta.
- Added moving to the parent comment and back.
- Improved snippet TicketLatest.
- Improved clearing of cache right after ticket creation.
- Added checkbox "show_in_tree" in the panel of Ticket.
- Added system setting "ticket_show_in_tree_default".
- Changed some default system setting.
- Added column "owner" to "TicketVote" for select rating of users.
- Added hotkeys for preview and submit tickets and comments.
- Added anonymous comments.
- Added simple math captcha for anonymous users.
- Removed inline onclick events.
- Fixed checking of "requiredFields" in TicketForm.
- Fixed restoring of old data in new ticket form by Sisyphus.
- Improved javascript for Internet Explorer.
- Improved snippets because closed thread can contain comments.

1.2.4 rc5
==========
- Improved update chunks on package upgrade.
- Fixed word "Array" when no tickets in section.
- Added requirement of pdoTools 1.9.x.
- Thread and comments are removed along with the page.
- Added aggregate relationship "Resource" for TicketThread.
- Added parameter "context" in snippet "TicketForm".
- Action.php works with respect to contexts.
- Fixed web/sections/getlist processor.
- Changed permission in mgr/comment/update from "update_document" to "comment_save".

1.2.4 rc1
==========
- Added two system settings: "section_id_as_alias" and "ticket_id_as_alias".
- Added "uri_override" checkbox.
- Improved snippets getTickets and getTicketsSection.
- Improved snippet "TicketForm" - see new properties.
- Improved chunks for working on iOS.
- Updated chunks for Bootstrap 3.
- Ability to update chunks on package upgrade.
- Removed chunk "tpl.Tickets.form.section.row".
- Fixed placeholder [[+children]] when fastMode = 0 in TicketComments.
- Ability to move comment from one thread to another.
- Improved check of users authentication.
- [#54] Field idx in TicketsSection.
- [#47] Auto hide "new comment" button.
- [#43] Parameter &redirectUnpublished in TicketForm.

1.2.3 pl3
==========
- Fixed requirement of TicketThread in snippet TicketLatest for showing last tickets.
- Improved snippet TicketLatest.
- [#52] Fixed checkboxes, again.
- Fixed duplicate replies in TicketComments when fastMode = 0.
- Removed user and email inputs in comment window in manager.

1.2.2 pl
==========
- Fixed load of CMP scripts

1.2.1 pl1
==========
- Fixed page with TicketsSection in manager for work in php 5.5.

1.2.0 pl
==========
- Replaced virtual field "comment" in TicketThread to real.
- Optimized snippet "getTicketsSections" for work on big sites.

1.1.3 pl
==========
- [#50] Added button for ticket duplicate in section grid.
- Improved two comboboxes in manager: "createdon" and "parent".

1.1.2 pl
==========
- [#51] Fixed work of checkboxes in manager.

1.1.1 pl
==========
- Improved load of pdoTools.
- Improved registration of javascript on frontend.
- Updated jQuery to version 1.10.2.
- Updated jQuery.Form to version 20131017.
- Added jQuery.Sisyphus for persisting your forms data in a browsers local storage.
- [#49] Added action fields to Ticket actions for more Form Customization.
- [#44] Fixed time format in tickets list.

1.1.0 pl
==========
- Added parameter "cacheTime" for TicketLatest.
- Fixed method Ticket::toArray().
- Added placeholder [[+date_ago]] to class "Ticket". You can use $ticket->get(\'date_ago\');
- Added new system parameter "section_content_default".
- Fixed blank template when create new ticket if no "tickets.default_template" set.
- Added more checkboxes for Ticket in manager.
- Added new system parameters "ticket_hidemenu_force" and "ticket_isfolder_force". You can disable them.
- If user edits ticket which was moved in the category into which the user has no rights, this category will be saved.

1.1.0 rc2
==========
- Fixed snippets for work with pdoTools 1.8.0.

1.1.0 rc1
==========
- Improved send of emails.
- Fixed unsubscription message.
- Email notifications are not sent to the authors of events.

1.1.0 beta2
==========
- Unread comments class removes only when it refreshed manually.
- Added JSON field "properties" to "TicketComment". Now you can store additional data in comments.
- Functions json_encode() and json_decode() replaced to modX::toJSON() and modX::fromJSON().
- Snippet "TicketForm" was completely rewrited.
- Added parameters "allowedFields" and "requiredFields" to snippet "TicketForm". You can use TVs names.
- Tickets created and updated through ajax without reload of form.
- Error messages is not sticky anymore.

1.1.0 beta
==========
- Added system setting "tickets.mail_from"
- Added system setting "tickets.mail_from_name"
- Added system setting "tickets.mail_bcc" for sending notifications for site admins.
- Added system setting "tickets.mail_bcc_level" for setting level of admin notifications.
- Added chunk "tpl.Tickets.ticket.email.bcc" for admin notification about new ticket.
- Added chunk "tpl.Tickets.comment.email.bcc" for admin notification about new comment.
- Added chunk "tpl.Tickets.comment.email.subscription" for notification of thread subscribers.
- Improved responses from server through ajax.
- New class "TicketQueue" for mail queue.
- New methods: Tickets::addQueue(), TicketThread:isSubscribed() and Tickets::Subscribe() that using TicketThread::Subscribe().
- Added system setting "tickets.mail_queue" for specifying whether to use delayed send of mail.
- [#37] Fixed issue with loading incorrect TVs when create new Ticket.
- [#35] Fixed javascript bug in comments, when "autoPublish=0".
- [#34] Unprocessed placeholders are now removed from preview.
- [#30] TicketsSection now has its own context menu in manager.
- [#29] Fixed errors when snippet "TicketLatest" called before "TicketComments".
- Fixed issue with change template when create new Ticket.
- Fixed issue with hidden new comment, when you reply to another one, and it was changed while you typing.

1.0.0 pl1 (requires pdoTools 1.4.1 or later)
==========
- Add ukrainian lang for frontend.
- Improved all snippets.
- Fixed parameter "parents" in "TicketLatest".

1.0.0 rc4
==========
- Fixed comments bugs when work in limited depth mode.
- Smooth scroll to just created comment.
- Improved ajax update of comments.

1.0.0 rc3
==========
- Comments fixes and improvements

1.0.0 rc2
==========
- Added comments level dots in default css.
- Added indication of unseen comments.
- Added ajax navigation through new comments.
- Added ajax fetching of new comments.
- Fixed primary keys in model of component.
- Added "mode" indication in comment save: "preview" or "create".
- Improved gravatar hash generation.

1.0.0 rc1
==========
- Improved snippet TicketLatest for displaying latest comments of user

1.0.0 rc (requires pdoTools 1.2.0 or later)
==========
- Fixed default parameters of snippets. "showLog" and "fastMode" are now really disabled by default.
- Rewrited snippet "getTickets". See snippet properties for details.
- Rewrited snippet "getTicketsSections". See snippet properties for details.
- Rewrited snippet "TicketLatest". See snippet properties for details.
- Rewrited snippet "TicketComments". See snippet properties for details.
- Updated awesome html editor "MarkItUp" to version 1.1.14.
- Added system parameters "tickets.frontend_js" and "tickets.frontend_css" for loading scripts and styles.
- Merged and rewrited default frontend styles and scripts.
- Replaced Tickets::getChunk() by pdoTools::getChunk().
- Added "jGrowl" script for frontend notifications.
- [#5] Fixed bug with no field "resource" when preview comment.
- [#6] Added parameter "depth" to snippet "TicketComments" for limitation thread depth.
- [#7] Added parameter "formBefore" to snippet "TicketComments" for specify where to show form, before or after.
- [#8] Sorting of thread comments depends from parameter "formBefore".
- [#11], [#12] Added checking of parent comment status when you reply on it.
- [#15] Added comments moderation. Check new parameter "autoPublish" of snippet "TicketComments".
- [#18] Parameters of thread now saving in "TicketThread" object and updates on page refresh.
- [mgr] Added ability to "close" thread. When thread is closed, comments are shown but adding new is disabled.
- [mgr] Added ability to "publish" and "unpublish" comments.

0.9.4
==========
- Fixed bug with ignoring default template of ticket on frontend.

0.9.3
==========
- [mgr] Template fix on ticket create
- [mgr] Fixed permissions for manage comments
- [mgr] Fixed non-install of some system parameters
- Improved snippets for calling them multiple times on one page
- Improved verification of ticket fields when create
- Fixed endless redirect on unpublished or deleted tickets
- Parameter "showLog" is now disabled by default in snippets
- Improved lexicons

0.9.2
==========
- [mgr] Fixed bug with no refresh on ticket create.
- Fixed alias of ticket, created from front.

0.9.1
==========
- [mgr] Fixed bug with no changing author of the ticket when creating it in manager.
- [mgr] Ability to change parent of the comment.
- [mgr] Ability to specify alias of the ticket.
- [mgr] Fixed empty dates in comment window.
- Placeholder [[+date_ago]] in snippet TicketLatest now created from "createdon" property.

0.9.0
==========
- Fixes for PHP 5.4
- Fix error when update ticket with disabled "automatic_alias".
- Deleted /component/tickets/pdotools/.
- Automatic installation of pdoTools from MODX repository.
- 2 new snippets: getTickets and getSections.
- getTickets is set by default for empty Section content.
- Changed chunk tpl.Tickets.list.row for displaying unread comments count.
- New chunk tpl.Tickets.sections.row.

0.8.3
==========
- MarkitUp javascript is now loadings at the bottom of web page.
- Private tickets. If ticket has this param, users will must be have permission "ticket_view_private" for reading it. Otherwise they will be redirected to "tickets.private_ticket_page".
- Fix processing MODX tags when edit comment.
- Little chunks fixes because of ajax issue in some browsers.
- Added parameter "toPlaceholder" to snippet TicketLatest.

0.8.2
==========
- Fixed bug with empty string after Jevix sanitization, if there was some html entities, such as &_nbsp; or &_raquo;.
- Added virtual field "comments" to class TicketThread. Now you can get it as they were natural with TicketThread::get() or TicketThread::toArray().
- Update last comment id and last comment time in thread on comment remove.

0.8.1
==========
- Added clearing cache of ticket on comments create\\update\\delete\\remove. Now you can call [[TicketComments]] cached and do not forget to activate next parameter.
- New system parameter "tickets.clear_cache_on_comment_save". If false, tickets cache will not be cleared on comment. Use it with uncached snippet call.
- No email notices on comments update.
- Improved redirect to tickets in plugin. Now it understands any nesting level.

0.8.0
==========
- [mgr] Added changing section of the ticket.
- [mgr] Added tab with all comments.
- Added editing of comments by author.
- New system parameter "tickets.comment_edit_time". You can set number of seconds during which comment can be edited.
- Added pretty dates formatting - Tickets::formatDate().
- Added placeholder [[+date_ago]] to comments chunks.
- Added placeholder [[+date_ago]] to last tickets and last comments chunks.
- Added virtual fields "comments" and "views" to class TicketsSection. Now you can get it as they were natural with TicketsSection::get() or TicketsSection::toArray().
- Improved chunks processing.
- Normal MODX tags when update ticket on frontend. [[*id]] instead of &#091;&#091;*id&#093;&#093;
- When you request ticket, that was moved into another section, with old url - user will be redirected to right page.

0.7.0
==========
- [mgr] Fixed default settings when create new ticket.
- Added placeholders of user profile in comments chunks.
- Added plugins events
- New system setting "snippet_prepare_comment" for custom prepare data of the comment.

0.6.0
==========
- [mgr] Added Custom Manager Page for manage comments. Now you can use TicketComments without Tickets.
- [mgr] Fixed selecting default template on ticket create.
- Improved handling of MODX tags in Ticket::getContent.
- Improved frontend javascript files for tickets and comments.
- Removed parameters &useJs=`` and &useCss=`` from snippet TicketComments.
- Added counting of ticket views by users.
- Latest comments now respects status of resource. It must be published and not deleted.
- Added disabling comments to ticket by setting flag "deleted" to comments thread.
- Added virtual fields "comments" and "views" to class Ticket. Now you can get it as they were natural with Ticket::get() or Ticket::toArray().
- Removed snippet getCommentsCount. Just use placeholder [[+comments]] or [[+views]] in chunks.
- Added placeholders [[+comments]] and [[+views]] to ticket page.
- Localized chunks.
- Chunks and snippets now are static by default.

0.5.0
==========
- [mgr] #2 Added support of TinyMCE
- [mgr] Fixed maximize comment window.
- [mgr] New ticket option "disable Jevix". If true - all content of the page will be displayed without filtration.
- [mgr] New ticket option "process MODX tags". If true - all tags on ticket page will be processed by MODX parser.
- [mgr] New system parameter "disable_jevix_default". Sets default value for new ticket.
- [mgr] New system parameter "process_tags_default". Sets default value for new ticket.
- Auto generation of introtext field by cutting text before tag <cut/> in ticket.
- When displaying tickets, tag <cut/> transformed into anchor <a name="cut"></a>
- Improved getLatestComments - now much more faster.

0.4.1
==========
- Added default content for TicketsSection in manager

0.4.0
==========
- Fixed installer
- Automatic installation of Jevix and creation of property sets for filter comments and tickets

0.3.3
==========
- Improved Ticket class, for better work with its cache
- Fixed work with dates on Ticket update

0.3.2
==========
- Custom manager page for Ticket

0.3.1
==========
- Security fixes
- comment_save permission is enabled in TicketsUserPolicy by default
- Snippet tagCut

0.3.0
==========
- Custom manager page for TicketsSection

0.2.0
==========
- Removed dependency on Quip. Now comments are very fast and handy.
- Various improvements and bug fixes

0.1.0
==========
- First beta',
    'license' => 'GNU GENERAL PUBLIC LICENSE
   Version 2, June 1991
--------------------------

Copyright (C) 1989, 1991 Free Software Foundation, Inc.
59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

Everyone is permitted to copy and distribute verbatim copies
of this license document, but changing it is not allowed.

Preamble
--------

  The licenses for most software are designed to take away your
freedom to share and change it.  By contrast, the GNU General Public
License is intended to guarantee your freedom to share and change free
software--to make sure the software is free for all its users.  This
General Public License applies to most of the Free Software
Foundation\'s software and to any other program whose authors commit to
using it.  (Some other Free Software Foundation software is covered by
the GNU Library General Public License instead.)  You can apply it to
your programs, too.

  When we speak of free software, we are referring to freedom, not
price.  Our General Public Licenses are designed to make sure that you
have the freedom to distribute copies of free software (and charge for
this service if you wish), that you receive source code or can get it
if you want it, that you can change the software or use pieces of it
in new free programs; and that you know you can do these things.

  To protect your rights, we need to make restrictions that forbid
anyone to deny you these rights or to ask you to surrender the rights.
These restrictions translate to certain responsibilities for you if you
distribute copies of the software, or if you modify it.

  For example, if you distribute copies of such a program, whether
gratis or for a fee, you must give the recipients all the rights that
you have.  You must make sure that they, too, receive or can get the
source code.  And you must show them these terms so they know their
rights.

  We protect your rights with two steps: (1) copyright the software, and
(2) offer you this license which gives you legal permission to copy,
distribute and/or modify the software.

  Also, for each author\'s protection and ours, we want to make certain
that everyone understands that there is no warranty for this free
software.  If the software is modified by someone else and passed on, we
want its recipients to know that what they have is not the original, so
that any problems introduced by others will not reflect on the original
authors\' reputations.

  Finally, any free program is threatened constantly by software
patents.  We wish to avoid the danger that redistributors of a free
program will individually obtain patent licenses, in effect making the
program proprietary.  To prevent this, we have made it clear that any
patent must be licensed for everyone\'s free use or not licensed at all.

  The precise terms and conditions for copying, distribution and
modification follow.


GNU GENERAL PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
---------------------------------------------------------------

  0. This License applies to any program or other work which contains
a notice placed by the copyright holder saying it may be distributed
under the terms of this General Public License.  The "Program", below,
refers to any such program or work, and a "work based on the Program"
means either the Program or any derivative work under copyright law:
that is to say, a work containing the Program or a portion of it,
either verbatim or with modifications and/or translated into another
language.  (Hereinafter, translation is included without limitation in
the term "modification".)  Each licensee is addressed as "you".

Activities other than copying, distribution and modification are not
covered by this License; they are outside its scope.  The act of
running the Program is not restricted, and the output from the Program
is covered only if its contents constitute a work based on the
Program (independent of having been made by running the Program).
Whether that is true depends on what the Program does.

  1. You may copy and distribute verbatim copies of the Program\'s
source code as you receive it, in any medium, provided that you
conspicuously and appropriately publish on each copy an appropriate
copyright notice and disclaimer of warranty; keep intact all the
notices that refer to this License and to the absence of any warranty;
and give any other recipients of the Program a copy of this License
along with the Program.

You may charge a fee for the physical act of transferring a copy, and
you may at your option offer warranty protection in exchange for a fee.

  2. You may modify your copy or copies of the Program or any portion
of it, thus forming a work based on the Program, and copy and
distribute such modifications or work under the terms of Section 1
above, provided that you also meet all of these conditions:

    a) You must cause the modified files to carry prominent notices
    stating that you changed the files and the date of any change.

    b) You must cause any work that you distribute or publish, that in
    whole or in part contains or is derived from the Program or any
    part thereof, to be licensed as a whole at no charge to all third
    parties under the terms of this License.

    c) If the modified program normally reads commands interactively
    when run, you must cause it, when started running for such
    interactive use in the most ordinary way, to print or display an
    announcement including an appropriate copyright notice and a
    notice that there is no warranty (or else, saying that you provide
    a warranty) and that users may redistribute the program under
    these conditions, and telling the user how to view a copy of this
    License.  (Exception: if the Program itself is interactive but
    does not normally print such an announcement, your work based on
    the Program is not required to print an announcement.)

These requirements apply to the modified work as a whole.  If
identifiable sections of that work are not derived from the Program,
and can be reasonably considered independent and separate works in
themselves, then this License, and its terms, do not apply to those
sections when you distribute them as separate works.  But when you
distribute the same sections as part of a whole which is a work based
on the Program, the distribution of the whole must be on the terms of
this License, whose permissions for other licensees extend to the
entire whole, and thus to each and every part regardless of who wrote it.

Thus, it is not the intent of this section to claim rights or contest
your rights to work written entirely by you; rather, the intent is to
exercise the right to control the distribution of derivative or
collective works based on the Program.

In addition, mere aggregation of another work not based on the Program
with the Program (or with a work based on the Program) on a volume of
a storage or distribution medium does not bring the other work under
the scope of this License.

  3. You may copy and distribute the Program (or a work based on it,
under Section 2) in object code or executable form under the terms of
Sections 1 and 2 above provided that you also do one of the following:

    a) Accompany it with the complete corresponding machine-readable
    source code, which must be distributed under the terms of Sections
    1 and 2 above on a medium customarily used for software interchange; or,

    b) Accompany it with a written offer, valid for at least three
    years, to give any third party, for a charge no more than your
    cost of physically performing source distribution, a complete
    machine-readable copy of the corresponding source code, to be
    distributed under the terms of Sections 1 and 2 above on a medium
    customarily used for software interchange; or,

    c) Accompany it with the information you received as to the offer
    to distribute corresponding source code.  (This alternative is
    allowed only for noncommercial distribution and only if you
    received the program in object code or executable form with such
    an offer, in accord with Subsection b above.)

The source code for a work means the preferred form of the work for
making modifications to it.  For an executable work, complete source
code means all the source code for all modules it contains, plus any
associated interface definition files, plus the scripts used to
control compilation and installation of the executable.  However, as a
special exception, the source code distributed need not include
anything that is normally distributed (in either source or binary
form) with the major components (compiler, kernel, and so on) of the
operating system on which the executable runs, unless that component
itself accompanies the executable.

If distribution of executable or object code is made by offering
access to copy from a designated place, then offering equivalent
access to copy the source code from the same place counts as
distribution of the source code, even though third parties are not
compelled to copy the source along with the object code.

  4. You may not copy, modify, sublicense, or distribute the Program
except as expressly provided under this License.  Any attempt
otherwise to copy, modify, sublicense or distribute the Program is
void, and will automatically terminate your rights under this License.
However, parties who have received copies, or rights, from you under
this License will not have their licenses terminated so long as such
parties remain in full compliance.

  5. You are not required to accept this License, since you have not
signed it.  However, nothing else grants you permission to modify or
distribute the Program or its derivative works.  These actions are
prohibited by law if you do not accept this License.  Therefore, by
modifying or distributing the Program (or any work based on the
Program), you indicate your acceptance of this License to do so, and
all its terms and conditions for copying, distributing or modifying
the Program or works based on it.

  6. Each time you redistribute the Program (or any work based on the
Program), the recipient automatically receives a license from the
original licensor to copy, distribute or modify the Program subject to
these terms and conditions.  You may not impose any further
restrictions on the recipients\' exercise of the rights granted herein.
You are not responsible for enforcing compliance by third parties to
this License.

  7. If, as a consequence of a court judgment or allegation of patent
infringement or for any other reason (not limited to patent issues),
conditions are imposed on you (whether by court order, agreement or
otherwise) that contradict the conditions of this License, they do not
excuse you from the conditions of this License.  If you cannot
distribute so as to satisfy simultaneously your obligations under this
License and any other pertinent obligations, then as a consequence you
may not distribute the Program at all.  For example, if a patent
license would not permit royalty-free redistribution of the Program by
all those who receive copies directly or indirectly through you, then
the only way you could satisfy both it and this License would be to
refrain entirely from distribution of the Program.

If any portion of this section is held invalid or unenforceable under
any particular circumstance, the balance of the section is intended to
apply and the section as a whole is intended to apply in other
circumstances.

It is not the purpose of this section to induce you to infringe any
patents or other property right claims or to contest validity of any
such claims; this section has the sole purpose of protecting the
integrity of the free software distribution system, which is
implemented by public license practices.  Many people have made
generous contributions to the wide range of software distributed
through that system in reliance on consistent application of that
system; it is up to the author/donor to decide if he or she is willing
to distribute software through any other system and a licensee cannot
impose that choice.

This section is intended to make thoroughly clear what is believed to
be a consequence of the rest of this License.

  8. If the distribution and/or use of the Program is restricted in
certain countries either by patents or by copyrighted interfaces, the
original copyright holder who places the Program under this License
may add an explicit geographical distribution limitation excluding
those countries, so that distribution is permitted only in or among
countries not thus excluded.  In such case, this License incorporates
the limitation as if written in the body of this License.

  9. The Free Software Foundation may publish revised and/or new versions
of the General Public License from time to time.  Such new versions will
be similar in spirit to the present version, but may differ in detail to
address new problems or concerns.

Each version is given a distinguishing version number.  If the Program
specifies a version number of this License which applies to it and "any
later version", you have the option of following the terms and conditions
either of that version or of any later version published by the Free
Software Foundation.  If the Program does not specify a version number of
this License, you may choose any version ever published by the Free Software
Foundation.

  10. If you wish to incorporate parts of the Program into other free
programs whose distribution conditions are different, write to the author
to ask for permission.  For software which is copyrighted by the Free
Software Foundation, write to the Free Software Foundation; we sometimes
make exceptions for this.  Our decision will be guided by the two goals
of preserving the free status of all derivatives of our free software and
of promoting the sharing and reuse of software generally.

NO WARRANTY
-----------

  11. BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY
FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW.  EXCEPT WHEN
OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES
PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED
OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.  THE ENTIRE RISK AS
TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU.  SHOULD THE
PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING,
REPAIR OR CORRECTION.

  12. IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING
WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR
REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES,
INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING
OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED
TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY
YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER
PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE
POSSIBILITY OF SUCH DAMAGES.

---------------------------
END OF TERMS AND CONDITIONS',
    'readme' => '--------------------
Tickets
--------------------
Author: Vasiliy Naumkin <bezumkin@yandex.ru>
--------------------

Tickets system for MODX Revolution.

Feel free to suggest ideas/improvements/bugs on GitHub:
http://github.com/bezumkin/Tickets/issues',
    'chunks' => 
    array (
      'tpl.Tickets.comment.email.bcc' => 'Пользователь <b>[[+name]]</b> оставил комментарий в тикете "<a href="[[~[[+resource]]?scheme=`full`]]">[[+pagetitle]]</a>":
<pre>[[+text]]</pre>
<br/><br/>
<a href="[[~[[+resource]]?scheme=`full`]]#comment-[[+id]]">Просмотреть</a>',
      'tpl.Tickets.comment.email.owner' => 'Пользователь <b>[[+name]]</b> оставил комментарий к вашему тикету "<a href="[[~[[+resource]]?scheme=`full`]]">[[+pagetitle]]</a>":
<pre>[[+text]]</pre>
<br/><br/>
<a href="[[~[[+resource]]?scheme=`full`]]#comment-[[+id]]">Ответить</a>',
      'tpl.Tickets.comment.email.reply' => 'Пользователь <b>[[+name]]</b> ответил на ваш комментарий к тикету "<a href="[[~[[+resource]]?scheme=`full`]]">[[+pagetitle]]</a>":
<pre>[[+text]]</pre>
<br/><br/>
<a href="[[~[[+resource]]?scheme=`full`]]#comment-[[+id]]">Ответить</a>
<br/><br/>
Текст комментария:
<pre>[[+parent_text]]</pre>',
      'tpl.Tickets.comment.email.subscription' => 'Пользователь <b>[[+name]]</b> оставил комментарий в тикете, на который вы подписаны - "<a href="[[~[[+resource]]?scheme=`full`]]">[[+pagetitle]]</a>":
<pre>[[+text]]</pre>
<br/><br/>
<a href="[[~[[+resource]]?scheme=`full`]]#comment-[[+id]]">Просмотреть</a>',
      'tpl.Tickets.comment.email.unpublished' => '<p>Пользователь <b>[[+name]]</b> оставил комментарий в тикете "<a href="[[~[[+resource]]?scheme=`full`]]">[[+pagetitle]]</a>".</p>
Теперь вам нужно проверить его и опубликовать на сайте:
<pre>[[+text]]</pre>
<br/><br/>
<a href="[[+manager_url]]">Все комментарии</a>',
      'tpl.Tickets.comment.form' => '<h4 id="comment-new-link">
	<a href="#" class="btn btn-default">[[%ticket_comment_create]]</a>
</h4>

<div id="comment-form-placeholder">
	<form id="comment-form" action="" method="post" class="well">
		<div id="comment-preview-placeholder"></div>
		<input type="hidden" name="thread" value="[[+thread]]" />
		<input type="hidden" name="parent" value="0" />
		<input type="hidden" name="id" value="0" />

		<div class="form-group">
			<label for="comment-editor"></label>
			<textarea name="text" id="comment-editor" cols="30" rows="10" class="form-control"></textarea>
		</div>

		<div class="form-actions">
			<input type="button" class="btn btn-default preview" value="[[%ticket_comment_preview]]" title="Ctrl + Enter" />
			<input type="submit" class="btn btn-primary submit" value="[[%ticket_comment_save]]" title="Ctrl + Shift + Enter" />
			<span class="time"></span>
		</div>
	</form>
</div>',
      'tpl.Tickets.comment.form.guest' => '<h4 id="comment-new-link">
	<a href="#" class="btn btn-default">[[%ticket_comment_create]]</a>
</h4>

<div id="comment-form-placeholder">
	<form id="comment-form" action="" method="post" class="well">
		<div id="comment-preview-placeholder"></div>
		<input type="hidden" name="thread" value="[[+thread]]" />
		<input type="hidden" name="parent" value="0" />
		<input type="hidden" name="id" value="0" />

		<div class="form-group">
			<label for="comment-name">[[%ticket_comment_name]]</label>
			<input type="text" name="name" value="[[+name]]" id="comment-name" class="form-control" />
			<span class="error"></span>
		</div>

		<div class="form-group">
			<label for="comment-email">[[%ticket_comment_email]]</label>
			<input type="text" name="email" value="[[+email]]" id="comment-email" class="form-control" />
			<span class="error"></span>
		</div>

		<div class="form-group">
			<label for="comment-editor"></label>
			<textarea name="text" id="comment-editor" cols="30" rows="10" class="form-control"></textarea>
		</div>

		[[+captcha]]

		<div class="form-actions">
			<input type="button" class="btn btn-default preview" value="[[%ticket_comment_preview]]" title="Ctrl + Enter" />
			<input type="submit" class="btn btn-primary submit" value="[[%ticket_comment_save]]" title="Ctrl + Shift + Enter" />
			<span class="time"></span>
		</div>
	</form>
</div>

<!--tickets_captcha
<div class="form-group">
	<label for="comment-captcha" id="comment-captcha">[[+captcha]]</label>
	<input type="text" name="captcha" value="" id="comment-captcha" class="form-control" />
	<span class="error"></span>
</div>
-->',
      'tpl.Tickets.comment.latest' => '<div class="tickets-latest-row[[+guest]]">
	<span class="user"><i class="glyphicon glyphicon-user"></i> [[+fullname]]</span> <span class="date">[[+date_ago]]</span>
	<br/>
	<span class="ticket">
		<a href="[[~[[+ticket.id]]]]#comment-[[+id]]">[[+ticket.pagetitle]]</a>
	</span>
	<nobr><i class="glyphicon glyphicon-comment"></i> <span class="comments">[[+comments]]</span></nobr>
</div>
<!--tickets_guest  ticket-comment-guest-->',
      'tpl.Tickets.comment.list.row' => '<div class="ticket-comment-row ticket-comment" id="comment-[[+id]]" data-id="[[+id]]">
	<div class="ticket-comment-body[[+guest]]">
		<div class="ticket-comment-header">
			<img src="[[+avatar]]" class="ticket-avatar" alt="" />
			<span class="ticket-comment-author">[[+fullname]]</span>
			<span class="ticket-comment-createdon">[[+date_ago]]</span>[[+comment_was_edited]]
			<span class="ticket-comment-link"><a href="[[+url]]#comment-[[+id]]">#</a></span>
			<span class="ticket-comment-star[[+can_star]]">[[+stared]][[+unstared]]</span>

			<span class="ticket-comment-rating[[+can_vote]][[+cant_vote]]">
				<span class="rating[[+rating_positive]][[+rating_negative]]" title="[[%ticket_rating_total]] [[+rating_total]]: ↑[[+rating_plus]] [[%ticket_rating_and]] ↓[[+rating_minus]]">[[+rating]]</span>
				<span class="vote plus[[+voted_plus]]" title="[[%ticket_like]]"><i class="glyphicon glyphicon-arrow-up"></i></span>
				<span class="vote minus[[+voted_minus]]" title="[[%ticket_dislike]]"><i class="glyphicon glyphicon-arrow-down"></i></span>
			</span>
		</div>
		<div class="ticket-comment-text">
			[[+text]]
		</div>
	</div>

	<a href="[[~[[+section.id]]]]" class="ticket-comment-section"><i class="glyphicon glyphicon-folder-open"></i> [[+section.pagetitle]]</a> &rarr;
	<a href="[[~[[+ticket.id]]]]" class="ticket-comment-ticket">[[+ticket.pagetitle]]</a> &nbsp;
	<span class="ticket-comment-comments"><i class="glyphicon glyphicon-comment"></i> [[+comments]]</span>
</div>
<!--tickets_comment_was_edited <span class="ticket-comment-edited">([[%ticket_comment_was_edited]])</span>-->
<!--tickets_can_vote  active-->
<!--tickets_cant_vote  inactive-->
<!--tickets_rating_positive  positive-->
<!--tickets_rating_negative  negative-->
<!--tickets_voted_plus  voted-->
<!--tickets_voted_minus  voted-->
<!--tickets_guest  ticket-comment-guest-->
<!--tickets_can_star  active-->
<!--tickets_stared <i class="glyphicon glyphicon-star stared star"></i>-->
<!--tickets_unstared <i class="glyphicon glyphicon-star unstared star"></i>-->',
      'tpl.Tickets.comment.login' => '<div class="ticket-comments alert alert-warning">
    <p>[[%ticket_comment_err_no_auth]]</p>
</div>',
      'tpl.Tickets.comment.one.auth' => '<li class="ticket-comment[[+comment_new]]" id="comment-[[+id]]" data-parent="[[+parent]]" data-newparent="[[+new_parent]]" data-id="[[+id]]">
	<div class="ticket-comment-body[[+guest]][[+bad]]">
		<div class="ticket-comment-header">
			<div class="ticket-comment-dot-wrapper"><div class="ticket-comment-dot"></div></div>
			<img src="[[+avatar]]" class="ticket-avatar" alt="" />
			<span class="ticket-comment-author">[[+fullname]]</span>
			<span class="ticket-comment-createdon">[[+date_ago]]</span>[[+comment_was_edited]]
			<span class="ticket-comment-link"><a href="[[+url]]#comment-[[+id]]">#</a></span>
			<span class="ticket-comment-star[[+can_star]]">[[+stared]][[+unstared]]</span>
			[[+has_parent]]
			<span class="ticket-comment-down"><a href="#" data-child="">&darr;</a></span>
			<span class="ticket-comment-rating[[+can_vote]][[+cant_vote]]">
				<span class="rating[[+rating_positive]][[+rating_negative]]" title="[[%ticket_rating_total]] [[+rating_total]]: ↑[[+rating_plus]] [[%ticket_rating_and]] ↓[[+rating_minus]]">[[+rating]]</span>
				<span class="vote plus[[+voted_plus]]" title="[[%ticket_like]]"><i class="glyphicon glyphicon-arrow-up"></i></span>
				<span class="vote minus[[+voted_minus]]" title="[[%ticket_dislike]]"><i class="glyphicon glyphicon-arrow-down"></i></span>
			</span>
		</div>
		<div class="ticket-comment-text">
			[[+text]]
		</div>
	</div>
	<div class="comment-reply">
		<a href="#" class="reply">[[%ticket_comment_reply]]</a>
		[[+comment_edit_link]]
	</div>
	<ol class="comments-list">[[+children]]</ol>
</li>
<!--tickets_comment_edit_link <a href="#" class="edit">[[%ticket_comment_edit]]</a>-->
<!--tickets_comment_was_edited <span class="ticket-comment-edited">([[%ticket_comment_was_edited]])</span>-->
<!--tickets_comment_new  ticket-comment-new-->
<!--tickets_can_vote  active-->
<!--tickets_cant_vote  inactive-->
<!--tickets_rating_positive  positive-->
<!--tickets_rating_negative  negative-->
<!--tickets_voted_plus  voted-->
<!--tickets_voted_minus  voted-->
<!--tickets_guest  ticket-comment-guest-->
<!--tickets_has_parent <span class="ticket-comment-up"><a href="[[+url]]#comment-[[+parent]]" data-id="[[+id]]" data-parent="[[+parent]]">&uarr;</a></span>-->
<!--tickets_can_star  active-->
<!--tickets_stared <i class="glyphicon glyphicon-star stared star"></i>-->
<!--tickets_unstared <i class="glyphicon glyphicon-star unstared star"></i>-->
',
      'tpl.Tickets.comment.one.deleted' => '<li class="ticket-comment" id="comment-[[+id]]">
	<div class="ticket-comment-body alert alert-warning">
		[[%ticket_comment_deleted_text]]
	</div>
	<ol class="comments-list">[[+children]]</ol>
</li>
',
      'tpl.Tickets.comment.one.guest' => '<li class="ticket-comment" id="comment-[[+id]]">
	<div class="ticket-comment-body[[+bad]]">
		<div class="ticket-comment-header">
			<div class="ticket-comment-dot-wrapper"><div class="ticket-comment-dot"></div></div>
			<img src="[[+avatar]]" class="ticket-avatar" alt="" />
			<span class="ticket-comment-author">[[+fullname]]</span>
			<span class="ticket-comment-createdon">[[+date_ago]]</span>
			<span class="ticket-comment-link"><a href="[[+url]]#comment-[[+id]]">#</a></span>

			[[+has_parent]]
			<span class="ticket-comment-down"><a href="#" data-child="">&darr;</a></span>

			<span class="ticket-comment-rating inactive">
				<span class="rating[[+rating_positive]][[+rating_negative]]">
					[[+rating]]
				</span>
				<span class="plus" title="[[%ticket_like]]">
					<i class="glyphicon glyphicon-arrow-up"></i>
				</span>
				<span class="minus" title="[[%ticket_dislike]]">
					<i class="glyphicon glyphicon-arrow-down"></i>
				</span>
			</span>
		</div>
		<div class="ticket-comment-text">
			[[+text]]
		</div>
	</div>
	<ol class="comments-list">[[+children]]</ol>
</li>
<!--tickets_rating_positive  positive-->
<!--tickets_rating_negative  negative-->
<!--tickets_has_parent <span class="ticket-comment-up"><a href="[[+url]]#comment-[[+parent]]" data-id="[[+id]]" data-parent="[[+parent]]">&uarr;</a></span>-->',
      'tpl.Tickets.comment.wrapper' => '<div class="comments">
	[[+modx.user.id:isloggedin:is=`1`:then=`
	<span class="comments-subscribe pull-right">
		<label for="comments-subscribe" class="checkbox">
			<input type="checkbox" name="" id="comments-subscribe" value="1" [[+subscribed]] /> [[%ticket_comment_notify]]
		</label>
	</span>
	`:else=``]]

	<h3 class="title">[[%comments]] (<span id="comment-total">[[+total]]</span>)</h3>

	<div id="comments-wrapper">
		<ol class="comment-list" id="comments">[[+comments]]</ol>
	</div>

	<div id="comments-tpanel">
		<div id="tpanel-refresh"></div>
		<div id="tpanel-new"></div>
	</div>
</div>

<!--tickets_subscribed checked-->
',
      'tpl.Tickets.form.create' => '<form class="well create" method="post" action="" id="ticketForm">
	<div id="ticket-preview-placeholder"></div>

	<input type="hidden" name="tid" value="0" />

	<div class="form-group">
		<label for="ticket-sections">[[%tickets_section]]</label>
		<select name="parent" class="form-control" id="ticket-sections">[[+sections]]</select>
		<span class="error"></span>
	</div>

	<div class="form-group">
		<label for="ticket-pagetitle">[[%ticket_pagetitle]]</label>
		<input type="text" class="form-control" placeholder="[[%ticket_pagetitle]]" name="pagetitle" value="" maxlength="50" id="ticket-pagetitle"/>
		<span class="error"></span>
	</div>

	<div class="form-group">
		<textarea class="form-control" placeholder="[[%ticket_content]]" name="content" id="ticket-editor" rows="10"></textarea>
		<span class="error"></span>
	</div>

	<div class="ticket-form-files">
		[[+files]]
	</div>

	<div class="form-actions row">
		<div class="col-md-6">
			<input type="button" class="btn btn-default preview" value="[[%ticket_preview]]" title="Ctrl + Enter" />
		</div>
		<div class="col-md-6 move-right">
			<input type="button" class="btn btn-primary publish" name="publish" value="[[%ticket_publish]]" title="" />
			<input type="submit" class="btn btn-danger draft" name="draft" value="[[%ticket_draft]]" title="Ctrl + Shift + Enter" />
		</div>
	</div>
</form>',
      'tpl.Tickets.form.file' => '<div class="ticket-file[[+deleted]][[+new]]" data-id="[[+id]]">
	<a href="[[+url]]" class="ticket-file-link" title="[[+file]]" target="_blank">
		<div class="ticket-file-image-wrapper">
			[[+file]]
		</div>
	</a>
	<div class="ticket-file-meta">
		<a href="#" class="ticket-file-delete">[[%ticket_file_delete]]</a>
		<a href="#" class="ticket-file-restore">[[%ticket_file_restore]]</a>
		<br/>
		<a href="#" class="ticket-file-insert">[[%ticket_file_insert]]</a>
		<br/>
		<span class="ticket-file-size">[[+size]] Kb</span>
	</div>
	<div class="ticket-file-template">
		<a href="[[+url]]">
			[[+name]]
		</a>
	</div>
</div>
<!--tickets_thumb <img src="[[+thumb]]" class="ticket-file-image" />-->
<!--tickets_deleted  deleted-->
<!--tickets_new  new-->',
      'tpl.Tickets.form.files' => '<div id="ticket-files-list">
	[[+files]]
	<div class="clearfix"></div>
</div>

<div id="ticket-files-container" data-action="ticket/file/upload">
	<a id="ticket-files-select" href="javascript:;">[[%ticket_file_select]]</a>
	<div id="ticket-files-progress">
		<span id="ticket-files-progress-count">0/0</span>
		<span id="ticket-files-progress-percent">0%</span>
		<div id="ticket-files-progress-bar"></div>
	</div>
</div>',
      'tpl.Tickets.form.image' => '<div class="ticket-file[[+deleted]][[+new]]" data-id="[[+id]]">
	<a href="[[+url]]" class="ticket-file-link" title="[[+file]]" target="_blank">
		<div class="ticket-file-image-wrapper">
			<img src="[[+thumb]]" class="ticket-file-image" />
		</div>
	</a>
	<div class="ticket-file-meta">
		<a href="#" class="ticket-file-delete">[[%ticket_file_delete]]</a>
		<a href="#" class="ticket-file-restore">[[%ticket_file_restore]]</a>
		<br/>
		<a href="#" class="ticket-file-insert">[[%ticket_file_insert]]</a>
		<br/>
		<span class="ticket-file-size">[[+size]] Kb</span>
	</div>
	<div class="ticket-file-template">
		<a href="[[+url]]" title="[[+name]]">
			<img src="[[+thumb]]" />
		</a>
	</div>
</div>
<!--tickets_deleted  deleted-->
<!--tickets_new  new-->',
      'tpl.Tickets.form.preview' => '<h3 class="title">[[+pagetitle]]</h3>
<div class="content">[[+content]]</div>
<h5 class="author">[[+modx.user.id:userinfo=`username`]]</h5>
',
      'tpl.Tickets.form.update' => '<form class="well update" method="post" action="" id="ticketForm">
	<div id="ticket-preview-placeholder"></div>

	<input type="hidden" name="tid" value="[[+id]]" />

	<div class="form-group">
		<label for="ticket-sections">[[%tickets_section]]</label>
		<select name="parent" class="form-control" id="ticket-sections">[[+sections]]</select>
		<span class="error"></span>
	</div>

	<div class="form-group">
		<label for="ticket-pagetitle">[[%ticket_pagetitle]]</label>
		<input type="text" class="form-control" placeholder="[[%ticket_pagetitle]]" name="pagetitle" value="[[+pagetitle]]" maxlength="50" id="ticket-pagetitle"/>
		<span class="error"></span>
	</div>

	<div class="form-group">
		<textarea class="form-control" placeholder="[[%ticket_content]]" name="content" id="ticket-editor" rows="10">[[+content]]</textarea>
		<span class="error"></span>
	</div>

	<div class="ticket-form-files">
		[[+files]]
	</div>

	<div class="form-actions row">
		<div class="col-md-6">
			<input type="button" class="btn btn-default preview" value="[[%ticket_preview]]" title="Ctrl + Enter" />
		</div>
		<div class="col-md-6 move-right">
			[[!+published:is=`1`:then=`
			<a href="[[~[[+id]]?scheme=`full`]]" class="btn btn-default btn-xs" target="_blank">[[%ticket_open]]</a>
			<input type="button" class="btn btn-danger draft" name="draft" value="[[%ticket_draft]]" title="" />
			`:else=`
			<input type="button" class="btn btn-primary publish" name="publish" value="[[%ticket_publish]]" title="" />
			`]]
			<input type="submit" class="btn btn-default save" name="save" value="[[%ticket_save]]" title="Ctrl + Shift + Enter" />
		</div>
	</div>
</form>',
      'tpl.Tickets.list.row' => '<div class="tickets-row">
    <h3 class="title"><a href="[[~[[+id]]]]">[[+pagetitle]]</a></h3>
	<div class="content">
		[[+introtext]]<br/>
		<a href="[[~[[+id]]]]#cut" class="btn btn-default ticket-read-more">[[%ticket_read_more]]</a>
	</div>
	<div class="ticket-meta row" data-id="[[+id]]">
		<span class="col-md-5">
			<i class="glyphicon glyphicon-calendar"></i> [[+date_ago]]
			&nbsp;&nbsp;
			<i class="glyphicon glyphicon-user"></i> [[+fullname]]
		</span>
		<span class="col-md-2"><a href="[[~[[+section.id]]]]"><i class="glyphicon glyphicon-folder-open"></i> [[+section.pagetitle]]</a></span>
		<span class="col-md-3">
			<span class="ticket-star[[+can_star]]">[[+stared]][[+unstared]] <span class="ticket-star-count">[[+stars]]</span></span>
			&nbsp;&nbsp;
			<i class="glyphicon glyphicon-eye-open"></i> [[+views]]
			&nbsp;&nbsp;
			<i class="glyphicon glyphicon-comment"></i> [[+comments]]  [[+new_comments]]
		</span>
		<span class="col-md-2 pull-right ticket-rating[[+active]][[+inactive]]">
			<span class="vote plus[[+voted_plus]]" title="[[%ticket_like]]"><i class="glyphicon glyphicon-arrow-up"></i></span>
			[[+can_vote]][[+cant_vote]]
			<span class="vote minus[[+voted_minus]]" title="[[%ticket_dislike]]"><i class="glyphicon glyphicon-arrow-down"></i></span>
		</span>
	</div>
</div>
<!--tickets_can_vote <span class="vote rating" title="[[%ticket_refrain]]"><i class="glyphicon glyphicon-minus"></i></span>-->
<!--tickets_cant_vote <span class="rating[[+rating_positive]][[+rating_negative]]" title="[[%ticket_rating_total]] [[+rating_total]]: ↑[[+rating_plus]] [[%ticket_rating_and]] ↓[[+rating_minus]]">[[+rating]]</span>-->
<!--tickets_new_comments <span class="ticket-new-comments">+[[+new_comments]]</span>-->
<!--tickets_active  active-->
<!--tickets_inactive  inactive-->
<!--tickets_voted_plus  voted-->
<!--tickets_voted_minus  voted-->
<!--tickets_rating_positive  positive-->
<!--tickets_rating_negative  negative-->
<!--tickets_can_star  active-->
<!--tickets_stared <i class="glyphicon glyphicon-star stared star"></i>-->
<!--tickets_unstared <i class="glyphicon glyphicon-star unstared star"></i>-->',
      'tpl.Tickets.meta' => '<div class="ticket-meta row" data-id="[[+id]]">
	<span class="col-md-5">
		<i class="glyphicon glyphicon-calendar"></i> [[+date_ago]]
		&nbsp;&nbsp;
		<i class="glyphicon glyphicon-user"></i> [[+fullname]]
	</span>
	<span class="col-md-2"><a href="[[~[[+section.id]]]]"><i class="glyphicon glyphicon-folder-open"></i> [[+section.pagetitle]]</a></span>
	<span class="col-md-2">
		<span class="ticket-star[[+can_star]]">[[+stared]][[+unstared]] <span class="ticket-star-count">[[+stars]]</span></span>
		&nbsp;&nbsp;
		<i class="glyphicon glyphicon-eye-open"></i> [[+views]]
	</span>
	<span class="col-md-2 pull-right ticket-rating[[+active]][[+inactive]]">
		<span class="vote plus[[+voted_plus]]" title="[[%ticket_like]]">
			<i class="glyphicon glyphicon-arrow-up"></i>
		</span>
		[[+can_vote]][[+cant_vote]]
		<span class="vote minus[[+voted_minus]]" title="[[%ticket_dislike]]">
			<i class="glyphicon glyphicon-arrow-down"></i>
		</span>
	</span>
</div>
[[+has_files]]

<!--tickets_can_vote <span class="vote rating" title="[[%ticket_refrain]]"><i class="glyphicon glyphicon-minus"></i></span>-->
<!--tickets_cant_vote <span class="rating[[+rating_positive]][[+rating_negative]]" title="[[%ticket_rating_total]] [[+rating_total]]: ↑[[+rating_plus]] [[%ticket_rating_and]] ↓[[+rating_minus]]">[[+rating]]</span>-->
<!--tickets_active  active-->
<!--tickets_inactive  inactive-->
<!--tickets_voted_plus  voted-->
<!--tickets_voted_minus  voted-->
<!--tickets_rating_positive  positive-->
<!--tickets_rating_negative  negative-->
<!--tickets_has_files
<ul class="ticket-files">
	<strong>[[%ticket_uploaded_files]]:</strong>
	[[+files]]
</ul>-->
<!--tickets_can_star  active-->
<!--tickets_stared <i class="glyphicon glyphicon-star stared star"></i>-->
<!--tickets_unstared <i class="glyphicon glyphicon-star unstared star"></i>-->',
      'tpl.Tickets.meta.file' => '<li>
	<a href="[[+url]]" target="_blank">[[+name]]</a> [[+size]] kb
</li>',
      'tpl.Tickets.sections.row' => '<div class="section-row">
	<h3 class="title"><a href="[[~[[+id]]]]">[[+pagetitle]]</a></h3>
	<div class="content">
		[[+introtext]]
	</div>
	<div class="section-meta row">
		<div class="col-md-1"><i class="glyphicon glyphicon-th-list"></i> [[+tickets]]</div>
		<div class="col-md-1"><i class="glyphicon glyphicon-eye-open"></i> [[+views]]</div>
		<div class="col-md-1"><i class="glyphicon glyphicon-comment"></i> [[+comments]]</div>
	</div>
</div>',
      'tpl.Tickets.sections.wrapper' => '[[+modx.user.id:isloggedin:is=`1`:then=`
<span class="tickets-subscribe pull-right">
	<label for="tickets-subscribe" class="checkbox">
		<input type="checkbox" name="" id="tickets-subscribe" value="1" data-id="[[*id]]" [[+subscribed:notempty=`checked`]] /> [[%tickets_section_notify]]
	</label>
</span>
`:else=``]]

<div class="tickets-list">
	[[+output]]
</div>',
      'tpl.Tickets.ticket.email.bcc' => '<p>Кто-то создал новый тикет у вас на сайте: <a href="[[~[[+id]]?scheme=`full`]]">[[+pagetitle]]</a>.
<pre style="background-color:#efefef;">[[+introtext]]</pre>
<p><b>[[+createdby:userinfo=`fullname`]]</b> ([[+createdby:userinfo=`email`]])</p>',
      'tpl.Tickets.ticket.email.subscription' => '<p>В секции "<a href="[[~[[+section.id]]?scheme=`full`]]">[[+section.pagetitle]]</a>", на которую вы подписаны, был опубликован новый тикет: "<a href="[[~[[+id]]?scheme=`full`]]">[[+pagetitle]]</a>".
<pre style="background-color:#efefef;">[[+introtext]]</pre>
<p>Автор: <b>[[+createdby:userinfo=`fullname`]]</b></p>',
      'tpl.Tickets.ticket.latest' => '<div class="tickets-latest-row">
	<span class="user"><i class="glyphicon glyphicon-user"></i> [[+fullname]]</span> <span class="date">[[+date_ago]]</span>
	<br/>
	<span class="section">
		<i class="glyphicon glyphicon-folder-open"></i> <a href="[[~[[+section.id]]]]">[[+section.pagetitle]]</a> <span class="arrow">&rarr;</span>
	</span>
	<span class="ticket">
		<a href="[[~[[+id]]]]">[[+pagetitle]]</a>
	</span>
	<nobr><i class="glyphicon glyphicon-comment"></i> <span class="comments">[[+comments]]</span></nobr>
</div>',
    ),
    'setup-options' => 'tickets-1.6.6-pl2/setup-options.php',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '8857206a8c90d7d776e1b9d5d8e075ae',
      'native_key' => 'tickets',
      'filename' => 'modNamespace/cb8416b0d00e01d14ddbdd98769cf808.vehicle',
      'namespace' => 'tickets',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'f36b1b8723d0be80492a1389b452caaa',
      'native_key' => 'tickets.date_format',
      'filename' => 'modSystemSetting/621dc74f61b1102ddd4df8da16e22ac1.vehicle',
      'namespace' => 'tickets',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '06d0159d08df4b49be17584c4d875875',
      'native_key' => 'tickets.enable_editor',
      'filename' => 'modSystemSetting/53abf301ab6b5e5e4175941a5ddfde51.vehicle',
      'namespace' => 'tickets',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '17922116fcd015f9f72bfd1e55046e93',
      'native_key' => 'tickets.frontend_css',
      'filename' => 'modSystemSetting/bcdc59367ef12be1282e7f848f9a061d.vehicle',
      'namespace' => 'tickets',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'e4366e0004eb0a7b294ab8a7cd7acb39',
      'native_key' => 'tickets.frontend_js',
      'filename' => 'modSystemSetting/f531a39cfaae857308dd64769effb842.vehicle',
      'namespace' => 'tickets',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5aec68d747473b9a4149337d1b9ad48e',
      'native_key' => 'tickets.editor_config.ticket',
      'filename' => 'modSystemSetting/a3a7931dd026aa2c320be5ff5135c9af.vehicle',
      'namespace' => 'tickets',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '09da4bab999aa09f769fee641e7996d5',
      'native_key' => 'tickets.editor_config.comment',
      'filename' => 'modSystemSetting/9d3ea06f308697aa4dc3942145baa170.vehicle',
      'namespace' => 'tickets',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '9c2de9d47a34391d63ed8d4a3c5668a2',
      'native_key' => 'tickets.default_template',
      'filename' => 'modSystemSetting/60fb695b5d63a555574abbd1a5feaabf.vehicle',
      'namespace' => 'tickets',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '78756dcb5e85dd9c20a33c21c2f1d58b',
      'native_key' => 'tickets.snippet_prepare_comment',
      'filename' => 'modSystemSetting/939ccc625d36d5b8f5e02689e8075856.vehicle',
      'namespace' => 'tickets',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4387cd74a49c44055278ec428eaba400',
      'native_key' => 'tickets.comment_edit_time',
      'filename' => 'modSystemSetting/629e98accb599a2e65bba0b48b921cb8.vehicle',
      'namespace' => 'tickets',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '3ad9e99ae84e43f8b24517be73ff0046',
      'native_key' => 'tickets.clear_cache_on_comment_save',
      'filename' => 'modSystemSetting/e3e381025717781d21709ef0f6e9adea.vehicle',
      'namespace' => 'tickets',
    ),
    11 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'b704d9085aa0d75298546e135f7b4cbd',
      'native_key' => 'tickets.private_ticket_page',
      'filename' => 'modSystemSetting/2aed2eadf393fa121181dec1e43053e3.vehicle',
      'namespace' => 'tickets',
    ),
    12 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '60d80ff314d08124ea6f176ecb0ef8c0',
      'native_key' => 'tickets.unpublished_ticket_page',
      'filename' => 'modSystemSetting/8bf61a9fab53eba78e05a7fa7942a1bc.vehicle',
      'namespace' => 'tickets',
    ),
    13 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4ad10ba0a0d8eba900284ef8c9bf28dc',
      'native_key' => 'tickets.ticket_max_cut',
      'filename' => 'modSystemSetting/2b4f001a989330bc7175d453e51d7732.vehicle',
      'namespace' => 'tickets',
    ),
    14 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ef522cf85c63749c9d8247fe217d174f',
      'native_key' => 'tickets.mail_from',
      'filename' => 'modSystemSetting/01fd1c029cdceb994ca77044e71155f0.vehicle',
      'namespace' => 'tickets',
    ),
    15 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ef48d8aa8f39338b8e0c5d2cd323600a',
      'native_key' => 'tickets.mail_from_name',
      'filename' => 'modSystemSetting/116ea211d62bd2be5ef5754519d79442.vehicle',
      'namespace' => 'tickets',
    ),
    16 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a8a426b0a10b66c10fbc0256d54ef3bb',
      'native_key' => 'tickets.mail_queue',
      'filename' => 'modSystemSetting/39c2d9355ea569c58f1c5f3b9ef938f0.vehicle',
      'namespace' => 'tickets',
    ),
    17 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5a86c8be20f8f6ef3f5243f5b6c7ae4c',
      'native_key' => 'tickets.mail_bcc',
      'filename' => 'modSystemSetting/d7b81e3fc61b013ab1a21d5eca260c6a.vehicle',
      'namespace' => 'tickets',
    ),
    18 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '89d77dfcdf2b7f28cc71019200560af7',
      'native_key' => 'tickets.mail_bcc_level',
      'filename' => 'modSystemSetting/6b383d78d010658f5c081f168d6a3d3c.vehicle',
      'namespace' => 'tickets',
    ),
    19 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6699a37cdd2a136d6ab8cd7b54c067d2',
      'native_key' => 'tickets.section_content_default',
      'filename' => 'modSystemSetting/87a831f9304a7870c0fdc6cc57e227d3.vehicle',
      'namespace' => 'tickets',
    ),
    20 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '299c8e12e0f2aca16f257c275a38233e',
      'native_key' => 'tickets.source_default',
      'filename' => 'modSystemSetting/410a295ee0de43db62804a9c0d51dca4.vehicle',
      'namespace' => 'tickets',
    ),
    21 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'bc9f66eeb06a516e49b36495587c7ca2',
      'native_key' => 'tickets.count_guests',
      'filename' => 'modSystemSetting/cf677a536ede0d785150a0e367d54ae8.vehicle',
      'namespace' => 'tickets',
    ),
    22 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '7131ab0b6beb7becafa7395a4654cdae',
      'native_key' => 'OnBeforeCommentSave',
      'filename' => 'modEvent/5c2f8e32be343c25d9d7227558093211.vehicle',
      'namespace' => 'tickets',
    ),
    23 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '804d3e89c14bd9d5bbd542abd955651f',
      'native_key' => 'OnCommentSave',
      'filename' => 'modEvent/a3e569a96475a4c67c832775f2abb728.vehicle',
      'namespace' => 'tickets',
    ),
    24 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'f444dea757450743f263bb68f4f67893',
      'native_key' => 'OnBeforeCommentPublish',
      'filename' => 'modEvent/f1843e57a220bc65fd7ddcd754556193.vehicle',
      'namespace' => 'tickets',
    ),
    25 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '3c60be4ae315180663ccc467eb4f9fc6',
      'native_key' => 'OnCommentPublish',
      'filename' => 'modEvent/c11ac89a6d5b09702a89cd22a32feaf2.vehicle',
      'namespace' => 'tickets',
    ),
    26 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'a4001094ec28cc0d30512d6c3cd3ef63',
      'native_key' => 'OnBeforeCommentUnpublish',
      'filename' => 'modEvent/47e6546b14985ee2c4afa4151da6666a.vehicle',
      'namespace' => 'tickets',
    ),
    27 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '71401f994ccc397657c935c030b08d0e',
      'native_key' => 'OnCommentUnpublish',
      'filename' => 'modEvent/4af37d28a5acdd12da212884da9c52c3.vehicle',
      'namespace' => 'tickets',
    ),
    28 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '406883140da1cac8b71ae571a4ac6a06',
      'native_key' => 'OnBeforeCommentDelete',
      'filename' => 'modEvent/409779dccdaea79f3517a952dd5c694c.vehicle',
      'namespace' => 'tickets',
    ),
    29 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '06fa92991affca916a360de6c6cccf33',
      'native_key' => 'OnCommentDelete',
      'filename' => 'modEvent/764eb97c51df954c2e3fb1a6a871e9e7.vehicle',
      'namespace' => 'tickets',
    ),
    30 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '1f9eadf7c48995073c2d5afbd3711e2f',
      'native_key' => 'OnBeforeCommentUndelete',
      'filename' => 'modEvent/66b4484fa80550b2362d44ae597a66b2.vehicle',
      'namespace' => 'tickets',
    ),
    31 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '1647f49733747c619c2a457fac01f7f4',
      'native_key' => 'OnCommentUndelete',
      'filename' => 'modEvent/62cd43de91c6addb1ced9f1d522c21a7.vehicle',
      'namespace' => 'tickets',
    ),
    32 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '93c0e8ac709610d879ffb353e15bab7d',
      'native_key' => 'OnBeforeCommentRemove',
      'filename' => 'modEvent/9f7b8675b9ad64167d91b8b4d3cd75ba.vehicle',
      'namespace' => 'tickets',
    ),
    33 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '1489bd66d23e356dbda8802565d4fd42',
      'native_key' => 'OnCommentRemove',
      'filename' => 'modEvent/36a849ff5db2459063545cf18b6c275b.vehicle',
      'namespace' => 'tickets',
    ),
    34 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '827d90d9868500cfd03f567733e496d0',
      'native_key' => 'OnBeforeTicketThreadClose',
      'filename' => 'modEvent/777e7525aa8d597556af7edb04f49bf8.vehicle',
      'namespace' => 'tickets',
    ),
    35 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '745b179fb6c1a69a0cbf7eb1866b38cd',
      'native_key' => 'OnTicketThreadClose',
      'filename' => 'modEvent/40d3d923da509ec5e0b0f4c8348cb4f0.vehicle',
      'namespace' => 'tickets',
    ),
    36 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'f4ccc924e708baaea40f53c10d44e6dd',
      'native_key' => 'OnBeforeTicketThreadOpen',
      'filename' => 'modEvent/20bdae0a5fb9eb69f504cc6bf8f66e48.vehicle',
      'namespace' => 'tickets',
    ),
    37 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '02145ec8f398457517f3c8ae6eceb269',
      'native_key' => 'OnTicketThreadOpen',
      'filename' => 'modEvent/e97af8ddd79c51f530fb9e79d7619887.vehicle',
      'namespace' => 'tickets',
    ),
    38 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '9b9a258333072bfbb5048beb1088fbdd',
      'native_key' => 'OnBeforeTicketThreadDelete',
      'filename' => 'modEvent/36b49dffa750afb20f3e735284035fd9.vehicle',
      'namespace' => 'tickets',
    ),
    39 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'a0d325f406f30a7ac5c7cff90dd8d6b2',
      'native_key' => 'OnTicketThreadDelete',
      'filename' => 'modEvent/55d25a44b2a12ade89370911554d0bf3.vehicle',
      'namespace' => 'tickets',
    ),
    40 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'e0dfe3187815ab47ac252d987dc0f6c9',
      'native_key' => 'OnBeforeTicketThreadUndelete',
      'filename' => 'modEvent/ad4cc70374f4ce417cdab5a824555dc0.vehicle',
      'namespace' => 'tickets',
    ),
    41 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '4a9b33683a827691df3e38a5a4c7bd89',
      'native_key' => 'OnTicketThreadUndelete',
      'filename' => 'modEvent/c223c62558e306903baa050632830209.vehicle',
      'namespace' => 'tickets',
    ),
    42 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'b3430933e6a1395b1670607143959302',
      'native_key' => 'OnBeforeTicketThreadRemove',
      'filename' => 'modEvent/51e6e33ac82f17a996aa4992e15d0cee.vehicle',
      'namespace' => 'tickets',
    ),
    43 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => 'ea8b4273638bf8a472bb95272486522f',
      'native_key' => 'OnTicketThreadRemove',
      'filename' => 'modEvent/d4d3cba94365572d58a5fb00719fa223.vehicle',
      'namespace' => 'tickets',
    ),
    44 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicy',
      'guid' => '30d3aea30b1b66078362bbf00cb0bf45',
      'native_key' => NULL,
      'filename' => 'modAccessPolicy/94b9fabc661c1d3334178fcacadbb355.vehicle',
      'namespace' => 'tickets',
    ),
    45 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicy',
      'guid' => 'f919508014acbbc088e08443acfbd5f0',
      'native_key' => NULL,
      'filename' => 'modAccessPolicy/062321ca6c713229038aa949ae8ce7b9.vehicle',
      'namespace' => 'tickets',
    ),
    46 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicy',
      'guid' => '82a35b68e9c246fbfd270690563560f1',
      'native_key' => NULL,
      'filename' => 'modAccessPolicy/194ebcd494367b91a14ef8b034ab19fc.vehicle',
      'namespace' => 'tickets',
    ),
    47 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicyTemplate',
      'guid' => 'c3a03e06fa29466ceb47a68edf35380d',
      'native_key' => NULL,
      'filename' => 'modAccessPolicyTemplate/04aa484d6832eac28ead980fa40260ec.vehicle',
      'namespace' => 'tickets',
    ),
    48 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modAccessPolicyTemplate',
      'guid' => '29e0e2c9ff0ae613e3aa8b508c601075',
      'native_key' => NULL,
      'filename' => 'modAccessPolicyTemplate/36a3552354b0038574fd18a566294792.vehicle',
      'namespace' => 'tickets',
    ),
    49 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => '18a1c10d606edf0957ded9c384977f56',
      'native_key' => 'tickets',
      'filename' => 'modMenu/6f85a96f6ebcadfe4f2869fbcf30317b.vehicle',
      'namespace' => 'tickets',
    ),
    50 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '4f5c823c7d1a0a12b17b302f7d5aeb8d',
      'native_key' => NULL,
      'filename' => 'modCategory/6f31a40f44bcd6a462b0daf833e2b76b.vehicle',
      'namespace' => 'tickets',
    ),
  ),
);