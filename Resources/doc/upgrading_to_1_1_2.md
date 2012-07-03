Upgrading CCDNForum KarmaBundle to 1.1.2
========================================

Run this SQL to upgrade.

```sql
set foreign_key_checks=0;

ALTER TABLE CC_Forum_Karma DROP FOREIGN KEY FK_80ACFD2012CA0262;
ALTER TABLE CC_Forum_Karma DROP FOREIGN KEY FK_80ACFD204B89032C;
ALTER TABLE CC_Forum_Karma DROP FOREIGN KEY FK_80ACFD209B5BB4B8;
DROP INDEX IDX_80ACFD209B5BB4B8 ON CC_Forum_Karma;
DROP INDEX IDX_80ACFD2012CA0262 ON CC_Forum_Karma;
DROP INDEX IDX_80ACFD204B89032C ON CC_Forum_Karma;
ALTER TABLE CC_Forum_Karma
	CHANGE post_id fk_post_id INT DEFAULT NULL,
	CHANGE for_user_id fk_rating_for_user_id INT DEFAULT NULL,
	CHANGE posted_by_user_id fk_rating_by_user_id INT DEFAULT NULL;
ALTER TABLE CC_Forum_Karma ADD CONSTRAINT FK_80ACFD20BBA63E00 FOREIGN KEY (fk_post_id) REFERENCES CC_Forum_Post(id) ON DELETE SET NULL;
ALTER TABLE CC_Forum_Karma ADD CONSTRAINT FK_80ACFD2059A28AFF FOREIGN KEY (fk_rating_for_user_id) REFERENCES fos_user(id) ON DELETE SET NULL;
ALTER TABLE CC_Forum_Karma ADD CONSTRAINT FK_80ACFD20F25DC488 FOREIGN KEY (fk_rating_by_user_id) REFERENCES fos_user(id) ON DELETE SET NULL;
CREATE INDEX IDX_80ACFD20BBA63E00 ON CC_Forum_Karma (fk_post_id);
CREATE INDEX IDX_80ACFD2059A28AFF ON CC_Forum_Karma (fk_rating_for_user_id);
CREATE INDEX IDX_80ACFD20F25DC488 ON CC_Forum_Karma (fk_rating_by_user_id);

set foreign_key_checks=1;
```

- [Return back to the docs index](index.md).
