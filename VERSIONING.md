# Versioning

How the valaisit.ch website is versioned and how every change is published.

## Version numbers

The repository holds one product, the website. Its versions follow `MAJOR.MINOR.PATCH`:

- **MAJOR** — a change of what the site is or does, for example opening the full site instead of the coming-soon page.
- **MINOR** — a new section, page, character or service.
- **PATCH** — corrections to text, pictures or layout.

A change to the documentation only (README.md, design-system.md, CLAUDE.md, VERSIONING.md and the like) gets no version.

Each version has:

- a tag `vX.Y.Z` on the merge commit in `main`;
- a section in `CHANGELOG.md`, newest first, written for visitors in plain language;
- a GitHub release named after the version, with that changelog section as its notes.

## How a version is published

Every change goes through a branch and a pull request. Nobody commits or pushes directly on the default branch (`main`).

To **publish** a change:

1. Bring the default branch up to date locally.
2. Create a branch from it:
   - `release/valaisit-vX.Y.Z` for a version;
   - `docs/<short-name>` for a change to the documentation only.
3. Commit on that branch, under the owner's own Git identity, with a plain message and no attribution lines (no "Co-Authored-By", no "Generated with").
4. Push the branch and open a pull request with `gh pr create`.
   - Title: the version number and a few words.
   - Body: the changelog section for this version, in plain language for users.
5. Merge it with a merge commit: `gh pr merge --merge --delete-branch`. No squash, no rebase.
6. Tag the merge commit on the default branch with `vX.Y.Z` and create the GitHub release with the changelog section as its notes.

A change to the documentation alone stops after step 5: no version, no tag, no release.

To **open a pull request** without publishing, stop after step 4 and share the link to the pull request.

## Rules

- Never force-push the default branch.
- Never move or delete a tag that has been pushed.
- Do not rewrite existing history.
